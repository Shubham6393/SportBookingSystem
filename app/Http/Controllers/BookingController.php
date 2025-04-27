<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Facility;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * BookingController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the bookings for current user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Auth::user()->bookings()->latest()->get();
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new booking.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $facilityId = $request->query('facility_id');
        $equipmentId = $request->query('equipment_id');
        
        $facilities = Facility::where('is_available', true)->get();
        $equipment = Equipment::where('is_available', true)->get();
        
        $selectedFacility = null;
        $selectedEquipment = null;
        
        if ($facilityId) {
            $selectedFacility = Facility::findOrFail($facilityId);
        }
        
        if ($equipmentId) {
            $selectedEquipment = Equipment::findOrFail($equipmentId);
        }
        
        return view('bookings.create', compact('facilities', 'equipment', 'selectedFacility', 'selectedEquipment'));
    }

    /**
     * Store a newly created booking in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'facility_id' => 'nullable|exists:facilities,id',
            'equipment_id' => 'nullable|exists:equipment,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'notes' => 'nullable|string',
        ]);
        
        // Check if either facility or equipment is selected
        if (empty($validated['facility_id']) && empty($validated['equipment_id'])) {
            return back()->withErrors(['booking' => 'You must select either a facility or equipment to book.'])->withInput();
        }
        
        // Check availability
        if (!empty($validated['facility_id'])) {
            $existingBookings = Booking::where('facility_id', $validated['facility_id'])
                ->where('booking_date', $validated['booking_date'])
                ->where(function($query) use ($validated) {
                    $query->whereBetween('start_time', [$validated['start_time'], $validated['end_time']])
                        ->orWhereBetween('end_time', [$validated['start_time'], $validated['end_time']])
                        ->orWhere(function($q) use ($validated) {
                            $q->where('start_time', '<=', $validated['start_time'])
                              ->where('end_time', '>=', $validated['end_time']);
                        });
                })->exists();
                
            if ($existingBookings) {
                return back()->withErrors(['time' => 'The selected facility is already booked for this time slot.'])->withInput();
            }
        }
        
        // Calculate total price
        $totalPrice = 0;
        
        if (!empty($validated['facility_id'])) {
            $facility = Facility::findOrFail($validated['facility_id']);
            $startTime = strtotime($validated['start_time']);
            $endTime = strtotime($validated['end_time']);
            $durationHours = ($endTime - $startTime) / 3600;
            $totalPrice += $facility->price_per_hour * $durationHours;
        }
        
        if (!empty($validated['equipment_id'])) {
            $equipment = Equipment::findOrFail($validated['equipment_id']);
            $totalPrice += $equipment->price_per_day;
        }
        
        // Create booking
        $booking = new Booking($validated);
        $booking->user_id = Auth::id();
        $booking->total_price = $totalPrice;
        $booking->status = 'pending';
        $booking->save();
        
        return redirect()->route('bookings.index')->with('success', 'Booking created successfully!');
    }

    /**
     * Display the specified booking.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        $this->authorize('view', $booking);
        return view('bookings.show', compact('booking'));
    }

    /**
     * Cancel the specified booking.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $this->authorize('delete', $booking);
        
        $booking->status = 'cancelled';
        $booking->save();
        
        return redirect()->route('bookings.index')->with('success', 'Booking cancelled successfully!');
    }
}

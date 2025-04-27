<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Facility;
use App\Models\Equipment;
use App\Models\User;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalUsers = User::count();
        $totalFacilities = Facility::count();
        $totalEquipment = Equipment::count();
        $totalBookings = Booking::count();
        $recentBookings = Booking::with(['user', 'facility', 'equipment'])->latest()->take(5)->get();
        $unreadMessages = ContactMessage::where('is_read', false)->count();
        
        return view('admin.dashboard', compact(
            'totalUsers', 
            'totalFacilities', 
            'totalEquipment', 
            'totalBookings', 
            'recentBookings',
            'unreadMessages'
        ));
    }

    /**
     * Show all bookings.
     *
     * @return \Illuminate\Http\Response
     */
    public function bookings()
    {
        $bookings = Booking::with(['user', 'facility', 'equipment'])->latest()->paginate(10);
        return view('admin.bookings.index', compact('bookings'));
    }
    
    /**
     * Update booking status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function updateBookingStatus(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);
        
        $booking->status = $validated['status'];
        $booking->save();
        
        return redirect()->back()->with('success', 'Booking status updated successfully!');
    }
    
    /**
     * Show all contact messages.
     *
     * @return \Illuminate\Http\Response
     */
    public function messages()
    {
        $messages = ContactMessage::latest()->paginate(10);
        
        // Mark messages as read
        ContactMessage::where('is_read', false)->update(['is_read' => true]);
        
        return view('admin.messages.index', compact('messages'));
    }
    
    /**
     * Delete a contact message.
     *
     * @param  \App\Models\ContactMessage  $message
     * @return \Illuminate\Http\Response
     */
    public function deleteMessage(ContactMessage $message)
    {
        $message->delete();
        
        return redirect()->route('admin.messages.index')->with('success', 'Message deleted successfully!');
    }
}

<x-app-layout>
    <div class="container py-5">
        <h2 class="text-white">Create New Booking</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="facility_id" class="form-label text-white">Select Facility (Optional)</label>
                                <select class="form-select @error('facility_id') is-invalid @enderror" id="facility_id" name="facility_id">
                                    <option value="">-- Select Facility --</option>
                                    @foreach($facilities as $facility)
                                        <option value="{{ $facility->id }}" {{ (old('facility_id') == $facility->id || (isset($selectedFacility) && $selectedFacility->id == $facility->id)) ? 'selected' : '' }}>
                                            {{ $facility->name }} - ₹{{ $facility->price_per_hour }}/hour
                                        </option>
                                    @endforeach
                                </select>
                                @error('facility_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="equipment_id" class="form-label text-white">Select Equipment (Optional)</label>
                                <select class="form-select @error('equipment_id') is-invalid @enderror" id="equipment_id" name="equipment_id">
                                    <option value="">-- Select Equipment --</option>
                                    @foreach($equipment as $item)
                                        <option value="{{ $item->id }}" {{ (old('equipment_id') == $item->id || (isset($selectedEquipment) && $selectedEquipment->id == $item->id)) ? 'selected' : '' }}>
                                            {{ $item->name }} - ₹{{ $item->price_per_day }}/day ({{ $item->quantity_available }} available)
                                        </option>
                                    @endforeach
                                </select>
                                @error('equipment_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text text-white">You can select either a facility, equipment, or both.</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="booking_date" class="form-label text-white">Booking Date</label>
                                <input type="date" class="form-control @error('booking_date') is-invalid @enderror" id="booking_date" name="booking_date" value="{{ old('booking_date', date('Y-m-d')) }}" min="{{ date('Y-m-d') }}" required>
                                @error('booking_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="start_time" class="form-label text-white">Start Time</label>
                                <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{ old('start_time', '09:00') }}" required>
                                @error('start_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="end_time" class="form-label text-white">End Time</label>
                                <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time" value="{{ old('end_time', '11:00') }}" required>
                                @error('end_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="notes" class="form-label text-white">Additional Notes (Optional)</label>
                        <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>
                        @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> Please note:
                        <ul class="mb-0">
                            <li>Facility bookings are charged on an hourly basis.</li>
                            <li>Equipment bookings are charged on a daily basis.</li>
                            <li>All bookings are subject to availability and admin confirmation.</li>
                        </ul>
                    </div>
                    
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('bookings.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Bookings
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check"></i> Confirm Booking
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 
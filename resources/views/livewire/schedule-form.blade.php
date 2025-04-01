<div>
    <!-- Success Message -->
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <!-- Add Schedule Button -->
    <button wire:click="openModal" class="btn btn-primary mb-3">+ Add Schedule</button>


    <!-- Modal -->
    @if ($isOpen)
    <div class="modal fade show d-block" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Schedule {{ $firm->firm_name }}</h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>

                <div class="modal-body">
                    <script>
                    document.addEventListener('livewire:load', function() {
                        Livewire.on('scheduleSaved', () => {
                            alert('✅ Schedule Successfully Created!');
                        });
                    });
                    </script>

                    <form wire:submit.prevent="saveSchedule">
                        <div class="mb-3">

                            <input type="text" wire:model="firm_id" class="form-control">

                        </div>

                        <div class="mb-3">
                            <label class="form-label">Select Week Days:</label>
                            <select wire:model="week" multiple class="form-select" size="7">
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                            </select>
                            @error('week')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="mb-3">
                            <label class="form-label">Shift</label>
                            {{-- <input type="time" wire:model="time" class="form-control"> --}}
                            <select id="shift" wire:model="shift" required class="form-select">
                                <option value="" selected>Select Shift</option>
                                <option value="Morning">Morning</option>
                                <option value="Evening">Evening</option>
                                <option value="Full Day">Full Day</option>
                            </select>
                            @error('shift')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="start_from">Start Time:</label>
                            <input type="text" id="start_from" wire:model="start_from" required class="form-select"
                                placeholder="Select Start Time">
                        </div>
                        <div class="mb-3">
                            <label for="end_from">End Time:</label>
                            <input type="text" id="end_from" wire:model="end_from" required class="form-select"
                                placeholder="Select End Time">
                        </div>
                        <div class="mb-3">
                            <label for="end_from">Maximum Booking:</label>
                            <input type="number" id="max_booking" wire:model="max_booking" required class="form-select"
                                placeholder="Enter Max Booking">
                        </div>
                        <button type="submit" class="btn btn-success">Save Schedule</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>


<!-- Flatpickr JS और CSS -->
<!-- @push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush -->

<!-- @push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endpush -->

<!-- Flatpickr Initialization Script -->
<!-- <script>
document.addEventListener('livewire:load', function() {
    function initFlatpickr() {
        if (document.getElementById("start_from")) {
            flatpickr("#start_from", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                onChange: function(selectedDates, dateStr, instance) {
                    Livewire.emit('setStartTime', dateStr);
                }
            });
        }

        if (document.getElementById("end_from")) {
            flatpickr("#end_from", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                onChange: function(selectedDates, dateStr, instance) {
                    Livewire.emit('setEndTime', dateStr);
                }
            });
        }
    }

    Livewire.hook('message.processed', () => {
        initFlatpickr(); // हर बार DOM अपडेट होने पर फिर से Flatpickr लोड करें
    });

    initFlatpickr(); // पेज लोड होते ही Flatpickr एक्टिवेट करें
});
</script> -->
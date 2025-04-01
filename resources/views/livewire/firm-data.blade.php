<div>
    <h3 class="mt-4">My Firms</h3>
    <div class="table-container">
        <table class="table table-bordered table-hover">
            <style>
                .firm-image {
                    width: 120px;
                    /* इमेज की साइज */
                    height: 120px;
                    border-radius: 10px;
                    /* हल्का राउंडेड */
                    object-fit: cover;
                    /* इमेज सही तरीके से फिट हो */
                    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                }
            </style>
            <thead class="table-dark">
                <tr>
                    <th>Firm</th>
                    <th>Location</th>
                    <th>Today Slot</th>
                    <th>Schedule</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($firms as $index => $firm)
                    <tr>
                        <td>{{ $firm->firm_name }}</td>
                        <td>
                            <a href="#">{{ $firm->city }}</a>
                        </td>
                        <td>
                            <button wire:click="toggleDetailsActive({{ $firm->id }})" class="btn btn-sm btn-primary">+
                                Add Today Schedule
                            </button>
                        </td>
                        <td>
                            @livewire('ScheduleForm', ['firm' => $firm], key($firm->id))

                        </td>
                        <td>
                            <button wire:click="toggleDetails({{ $index }}); $refresh"
                                class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i> View
                            </button>

                        </td>
                    </tr>


                    {{-- Active Button Expand --}}
                    @if ($expandedRowActive === $firm->id)
                        <tr>
                            <td colspan="5">
                                <table class="table table-bordered bg-info text-white">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Week</th>
                                            <th>Shift</th>
                                            <th>Start From</th>
                                            <th>End From</th>
                                            <th>Max Booking</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Example Static Data --}}
                                        @foreach ($sch->allschedules as $info)
                                        @php
                                        $isChecked = \App\Models\TodaySchedule::where([
                                            'schedule_id' => $info->id,
                                            'firm_id' => $firm->id,
                                            'user_id' => Auth::user()->id,
                                            'todaydate' => date('Y-m-d'),
                                        ])->exists();
                                    @endphp 
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $info->week }}</td>
                                                <td>{{ $info->shift }}</td>
                                                <td>{{ $info->start_from }}</td>
                                                <td>{{ $info->end_from }}</td>
                                                <td>{{ $info->max_booking }}</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            wire:click="toggleTodaySchedule({{ $info->id }}, {{ $firm->id }})"
                                                            @if ($isChecked) checked @endif>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @if ($firm->allschedules->count() == 0)
                                    <p class="text-muted text-center">No Today schedules found.</p>
                                @endif
                            </td>
                        </tr>
                    @endif

                    {{-- view Button Expand --}}
                    @if ($expandedRow === $index)
                        <tr>
                            <td colspan="5">
                                <div class="d-flex align-items-center p-3 bg-light border">
                                    <!-- Left Side (Image) -->
                                    <div class="me-10">
                                        <img src="{{ $firm->profilepic ? asset('/images/' . $firm->profilepic) : asset('/images/download.png') }}"
                                            alt="Firm Image" class="firm-image">

                                        <div class="mt-2 text-center">
                                            <form action="/firm/updateprofilepic" method="post"
                                                id="firm_{{ $index }}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" id=""
                                                    value="{{ $firm->id }}">
                                                <label for="profilepic" class="link active cursor-pointer"
                                                    title="Upload Profile Image">{{ $firm['profilepic'] ? 'Edit' : 'Upload' }}
                                                    Image</label>
                                                <input type="file" name="profilepic" id="profilepic" accept="image/*"
                                                    style="display: none"
                                                    onchange="document.getElementById('firm_{{ $index }}').submit()">
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Right Side (Details) -->
                                    <div>
                                        <strong>Name: </strong> {{ $firm->firm_name }} <br>
                                        <strong>Mobile: </strong> {{ $firm->firm_mobile }} <br>
                                        <strong>Email: </strong> {{ $firm->firm_email }} <br>
                                        <strong>Address: </strong>
                                        {{ $firm->address_line_1 . ', ' . $firm->address_line_2 . ', ' . $firm->city . ', ' . $firm->state . '-' . $firm->pincode }}<br>
                                        <strong>Since: </strong> {{ $firm->since ?? 'N/A' }} <br>
                                        <strong>Business Type: </strong> {{ $firm->business_type ?? 'N/A' }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

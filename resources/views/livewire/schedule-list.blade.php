<div class="container mt-5">
    <h2 class="text-center mb-4">📅 Your Schedule</h2>

    @foreach ($firms as $firm)
    <div class="card mb-10 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Firm Name: {{ $firm->firm_name }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
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
                        @foreach ($firm->allschedules as $index => $schedule)
                        <tr class="table-success">
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $schedule->week }}</td>
                            <td>{{ $schedule->shift }}</td>
                            <td>{{ $schedule->start_from }}</td>
                            <td>{{ $schedule->end_from }}</td>
                            <td>{{ $schedule->max_booking }}</td>
                            <td>
                                <button wire:click="delete({{$schedule->id}})" class="btn btn-sm btn-danger">🗑 Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($firm->allschedules->count() == 0)
                    <p class="text-muted text-center">No schedules found.</p>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>

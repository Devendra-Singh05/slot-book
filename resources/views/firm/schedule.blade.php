<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f5f5f5;
    }

    .form-container {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        width: 100%;
        max-width: 450px;
    }

    .form-container h2 {
        background-color: rgb(107, 176, 255);
        color: white;
        font-size: 20px;
        text-align: center;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    select[multiple] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 16px;
        background-color: #fff;
    }

    input,
    select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        color: #333;
        box-sizing: border-box;
    }

    input:focus,
    select:focus {
        outline: none;
        border-color: #2575fc;
        box-shadow: 0 0 5px rgba(37, 117, 252, 0.5);
    }

    button {
        background-color: rgb(107, 176, 255);
        color: white;
        border: none;
        padding: 12px;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        width: 50%;
        transition: background-color 0.3s ease;
        display: block;
        margin: 0 auto;
    }

    button:hover {
        background-color: #1a5bb8;
    }
    </style>
</head>

<body>
    <div class="form-container">

        <h2>Create Schedule For "{{$firm['firm_name']}}"</h2>
        <form action="/schedule" method="POST">
            @csrf
            <input type="hidden" name="firm_id" value="{{$firm->id}}">
            <div class="form-group">
                <label for="week" class="form-label">Select Week Days:</label>
                <select id="week" name="week[]" class="form-select" multiple required size="7">
                    <option value="Sunday">Sunday</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                </select>
            </div>

            <div class="form-group">
                <label for="shift">Select Shift:</label>
                <select id="shift" name="shift" required>
                    <option value="" disabled selected>Select Shift</option>
                    <option value="Morning">Morning</option>
                    <option value="Evening">Evening</option>
                    <option value="Full Day">Full Day</option>
                </select>
            </div>

            <div class="form-group">
                <label for="start_from">Start Time:</label>
                <input type="text" id="start_from" name="start_from" required placeholder="Select Start Time">
            </div>

            <div class="form-group">
                <label for="end_from">End Time:</label>
                <input type="text" id="end_from" name="end_from" required placeholder="Select End Time">
            </div>

            <div class="form-group">
                <label for="max_booking">Maximum Booking:</label>
                <input type="number" id="max_booking" name="max_booking" placeholder="Enter maximum booking count"
                    required>
            </div>

            <button type="submit">Save Schedule</button>
        </form>
    </div>
</body>

</html>
<script>
flatpickr("#start_from", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "h:i K", // 12-hour format with AM/PM
});

flatpickr("#end_from", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "h:i K", // 12-hour format with AM/PM
});
</script>
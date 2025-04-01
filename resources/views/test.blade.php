<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firm Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .registration-container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            animation: fadeIn 0.8s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .form-control {
            border-radius: 5px;
            padding: 10px;
            font-size: 14px;
            transition: all 0.3s ease-in-out;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
        }
        .shake {
            animation: shake 0.3s ease-in-out;
            border-color: red;
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <h3>Firm Registration</h3>
        <form id="registrationForm">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Firm Name" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Mobile Number" required>
            </div>
            <div class="mb-3">
                <textarea class="form-control" rows="2" placeholder="Address" required></textarea>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="City" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="State" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Country" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="GST Number">
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
    </div>
    <script>
        function shakeInput(input) {
            input.classList.add('shake');
            setTimeout(() => input.classList.remove('shake'), 500);
        }

        document.getElementById("registrationForm").addEventListener("submit", function(event) {
            let inputs = document.querySelectorAll(".form-control");
            let isValid = true;
            inputs.forEach(input => {
                if (input.value.trim() === "") {
                    shakeInput(input);
                    isValid = false;
                }
            });
            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
</x-app-layout>
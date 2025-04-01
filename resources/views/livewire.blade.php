<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    .sidebar {
        width: 250px;
        height: 100vh;
        background: #212529;
        color: white;
        position: fixed;
        padding: 20px;
    }

    .sidebar a {
        color: white;
        text-decoration: none;
        display: flex;
        align-items: center;
        padding: 12px;
        border-radius: 5px;
        margin: 5px 0;
    }

    .sidebar a i {
        margin-right: 10px;
    }

    .sidebar a:hover {
        background: #495057;
    }

    .content {
        margin-left: 270px;
        padding: 20px;
    }

    .card {
        border: none;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }

    .card:hover {
        transform: scale(1.03);
    }

    .table tbody tr:hover {
        background: #f1f1f1;
    }
    </style>
</head>

<body>
    <div class="sidebar">
        <h3 class="text-center">Vendor Dashboard</h3>
        <a href="#"><i class="fas fa-home"></i> Home</a>
        <a href="#"><i class="fas fa-building"></i> My Firms</a>
        <a href="#"><i class="fas fa-calendar"></i> Schedules</a>
        <a href="#"><i class="fas fa-cog"></i> Settings</a>
    </div>
    <div class="content">
        <h2 class="mb-4">Dashboard Overview</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card p-4 text-white bg-primary">
                    <h5><i class="fas fa-store"></i> Total Firms</h5>
                    <h3>5</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 text-white bg-success">
                    <h5><i class="fas fa-check-circle"></i> Active Firms</h5>
                    <h3>3</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 text-white bg-warning">
                    <h5><i class="fas fa-calendar-alt"></i> Upcoming Schedules</h5>
                    <h3>7</h3>
                </div>
            </div>
        </div>

        <h3 class="mt-4">My Firms</h3>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Firm Name</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ABC Traders</td>
                    <td>New York</td>
                    <td><span class="badge bg-success">Active</span></td>
                    <td><button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> View</button></td>
                </tr>
                <tr>
                    <td>XYZ Services</td>
                    <td>Los Angeles</td>
                    <td><span class="badge bg-danger">Inactive</span></td>
                    <td><button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> View</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
<x-app-layout>


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

            html,
            body {
                margin: 0;
                padding: 0;
                overflow-x: hidden;
                /* Horizontal Scroll हटाए */
                height: 100%;
            }

            .sidebar {
                width: 250px;
                height: calc(100vh - 60px);
                /* Navbar के नीचे पूरा cover */
                background: #212529;
                color: white;
                position: fixed;
                top: 60px;
                /* Navbar की height */
                left: 0;
                padding: 20px;
                overflow-y: auto;
                /* अगर ज्यादा Links हों तो Scroll */
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
                /* Sidebar के बराबर gap */
                padding: 20px;
                margin-top: 60px;
                /* Navbar की height */
                min-height: calc(100vh - 60px);
                /* पूरा viewport cover करें */
                overflow-y: auto;
            }

            .card {
                border: none;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                transition: transform 0.2s;
            }

            .card:hover {
                transform: scale(1.03);
            }

            .table-container {
                max-height: 300px;
                /* Table के लिए Fixed Height */
                overflow-y: auto;
                /* Vertical Scroll Enable करें */
                border: 1px solid #ddd;
                /* Table को Border देना */
            }

            .table thead {
                position: sticky;
                top: 0;
                background: #343a40;
                /* Header को Dark Background देना */
                color: white;
                z-index: 2;
            }
        </style>
    </head>

    <body>
        <div class="sidebar">
            <h3 class="text-center">Welcome {{ Auth::user()->name }}</h3>
            <a href="/firm"><i class="fas fa-home"></i> Home</a>
            <a href="/firm/create"><i class="fas fa-building"></i> Add New Firms</a>
            <a href="/schedule"><i class="fas fa-calendar"></i> Schedules</a>
            <a href="#"><i class="fas fa-cog"></i> Settings</a>
        </div>
        <div class="content">
            <h2 class="mb-4">Dashboard Overview</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-4 text-white bg-primary">
                        <h5><i class="fas fa-store"></i> Total Firms</h5>
                        <h3>{{ $firms->count() }}</h3>
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

            {{-- @livewire('TodaySchedule') --}}
            @livewire('FirmData')
            </tbody>
            </table>
        </div>
        </div>
    </body>
</x-app-layout>

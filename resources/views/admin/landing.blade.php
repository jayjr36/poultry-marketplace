<!-- resources/views/admin/landing.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Landing Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .header {
            background-color: #343a40;
            color: white;
            padding: 50px 0;
            text-align: center;
        }
        .header h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        .header p {
            font-size: 1.2rem;
        }
        .overview {
            padding: 50px 0;
            text-align: center;
        }
        .overview h2 {
            margin-bottom: 40px;
        }
        .quick-links {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .quick-links a {
            text-decoration: none;
        }
        .quick-links .card {
            transition: transform 0.3s ease;
        }
        .quick-links .card:hover {
            transform: scale(1.05);
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="container">
            <h1>Welcome to the Admin Panel</h1>
            <p>Manage your application with ease and efficiency</p>
        </div>
    </header>

    <section class="overview">
        <div class="container">
            <h2>Overview</h2>
            <p class="lead">Here you can manage users, monitor activities, and perform administrative tasks with a few clicks.</p>
        </div>
    </section>

    <section class="quick-links">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('admin.home') }}">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Home</h5>
                                <p class="card-text">Overview of the admin panel</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('admin.withdrawal.requests') }}">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Withdrawals</h5>
                                <p class="card-text">Review and manage withdrawal requests</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.topup.form') }}">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Top up</h5>
                                <p class="card-text">Manage top up requests</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>

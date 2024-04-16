@include('layout');

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <!-- Add user settings or other navigation items here -->
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-md-2 bg-dark bg-gradient" >
                <ul class="nav flex-column px-1">
                    <li class="nav-item">
                        <a class="nav-link btn btn-info btn-lg text-white"  role="button" href="{{route('admin.landing')}}"  target="iframe">Dashboard</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link btn btn-info btn-lg text-white"  role="button" href="{{route('posts.index')}}"  target="iframe">View Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-info btn-lg text-white"  type="button" href="{{route('carts.index')}}" target="iframe">Orders</a>
                   
                    <li class="nav-item">
                        <a class="nav-link btn btn-info btn-lg text-white"  role="button" href="{{ route('posts.create') }}" target="iframe">Add Post</a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link btn btn-info btn-lg text-white"  type="button" href="{{route('courier.create')}}" target="iframe">Add Courriers</a>
                    </li>
                </li>
                   <li class="nav-item">
                         <a class="nav-link btn btn-info btn-lg text-white"  type="button" href="{{route('courier.index')}}" target="iframe">Couriers</a>
                     </li>-->
                    <!-- Add more sidebar buttons as needed -->
                </ul>
            </div>

            <!-- Right Main Pane with Iframe -->
            <div class="col">
                <iframe src="{{route('admin.landing')}}" frameborder="0" width="100%" name="iframe" height="800"></iframe>
                <!-- Replace the URL above with your desired content -->
            </div>
        </div>
    </div>

 </body>
</html>

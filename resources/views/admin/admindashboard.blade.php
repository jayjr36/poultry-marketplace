<!-- resources/views/admin/dashboard.blade.php -->
@extends('layout')

@section('content')
<div class="container-fluid d-flex">
    <!-- Sidebar -->
    <div class="sidebar bg-dark text-white">
        <h2 class="text-center my-4">Admin Dashboard</h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" target="iframepanel" href="{{ route('admin-landing') }}" onclick="loadIframe('home')">Home</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link text-white" target="iframepanel" href="#" onclick="loadIframe('users')">Users</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link text-white" target="iframepanel" href="{{ route('admin.withdrawal.requests') }}" onclick="loadIframe('withdrawals')">Withdrawals</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" target="iframepanel" href="{{ route('admin.topup.form') }}" onclick="loadIframe('settings')">Top up</a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="nav-link btn btn-info btn-lg text-white" type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Main content -->
    <div class="flex-grow-1">
        <iframe name="iframepanel" id="iframeContent" src="{{ url('/admin/landing/home') }}" style="width:100%; height:100vh; border:none;"></iframe>
    </div>
</div>
@endsection

<script>
    function loadIframe(page) {
        const iframe = document.getElementById('iframeContent');
        iframe.src = `/admin/${page}`;
    }
</script>

<style>
    .container-fluid {
        display: flex;
        flex-wrap: nowrap;
    }
    .sidebar {
        height: 100vh;
        width: 200px;
        position: fixed;
        top: 0;
        left: 0;
        padding-top: 60px;
    }
    .nav-link {
        color: white;
    }
    .nav-link:hover {
        background-color: #495057;
    }
    .flex-grow-1 {
        margin-left: 200px; /* Adjust this value according to the width of the sidebar */
    }
</style>

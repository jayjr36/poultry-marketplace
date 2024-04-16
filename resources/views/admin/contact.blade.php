<!-- resources/views/about.blade.php -->

@extends('layout')

@section('content')
    <div class="container-fluid bg-dark  d-flex align-items-center" style="height: 100vh;">
        <h1 class="text-center mb-4">About Us</h1>
        <div class="row  text-center justify-content-center">
            <div class="col-md-8 ">
                <div class="card border-2 shadow-lg mb-4">
                    <div class="card-body text-white bg-dark">
                        <h3 class="card-title">About Us</h3>
                        <p class="card-text">Welcome to our online sales platform specializing in the sale of hens and cocks. At our platform,<br> we believe in providing a seamless and efficient marketplace for breeders,<br> enthusiasts, and buyers alike.</p>
                        <p class="card-text">With a focus on quality and reliability, we offer a diverse range of poultry options, including<br> various breeds, ages, and qualities. Whether you're a hobbyist looking for your next show <br>bird  or a farmer in need of quality breeding stock, our platform<br> has something for everyone.</p>
                        <p class="card-text">Our mission is to connect sellers with potential buyers in a user-friendly environment, ensuring <br>transparency, security, and customer satisfaction every step of the way. We are committed <br> to fostering a thriving community of poultry enthusiasts and supporting<br> the growth of the industry.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-2 shadow-lg">
                    <div class="card-body  text-white bg-dark">
                        <h3 class="card-title">Contact Us</h3>
                        <p class="card-text">If you have any questions or inquiries, feel free to reach out to us:</p>
                        <ul class="list-unstyled">
                            <li>Email: example@example.com</li>
                            <li>Phone: +123456789</li>
                            <li>Address: 123 Street, City, Country</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

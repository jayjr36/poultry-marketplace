
 <!-- Main Content -->
 @extends('layout')

 @section('content')
 
 <div class="container-fluid bg-dark" id="homeframe" style="height: 100vh;">
    <div class="row py-5 h-100">
        <div class="col-md-7 justify-content-center bg-dark d-flex align-items-center">
            <div class="text-center text-md-left text-light">
                <h1 class="display-4">Hey there, poultry pals!</h1>
                <h3 class="mb-4">Step into our virtual coop <br> and discover a world of <br> feathered wonders!</h3>
                <h3>From colorful hens to <br> majestic cocks, we have <br> something for every <br> poultry enthusiast.
                </h3>
               
            </div>
        </div>
        <div class="col-md-5 d-flex justify-content-center align-items-center">
            <div class="d-flex flex-column align-items-center position-relative">
                <img src="{{ asset('images/img1.jpg') }}" class="img-fluid rounded-circle mb-3" alt="Image"
                    style="max-width: 100%; ;">
                <img src="{{ asset('images/img1.jpg') }}" class="img-fluid rounded-circle mb-3" alt="Image"
                    style="max-width: 100%; transform: rotate(0deg); margin-top: -20px;">
                <img src="{{ asset('images/img1.jpg') }}" class="img-fluid rounded-circle" alt="Image"
                    style="max-width: 100%; transform: rotate(0deg); margin-top: -40px;">
            </div>
        </div>
    </div>
</div>
</div>
@endsection
<!-- resources/views/posts.blade.php -->

@extends('layout')

@section('content')
<div class="container-fluid bg-dark text-white" style="height: 100vh;">
    <h1 class="text-center mb-4">Posts</h1>
    <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#cartModal" onclick="showCart()">Show Cart</button>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-3">
                <div class="card mb-4">
                    @if (strpos($post->media_type, 'image') !== false)
                    <center>
                        <img src="{{ asset('storage/images/' . $post->media) }}" height="150px" width="150px" class="card-img-top" alt="{{ $post->title }}">
                    </center>
                    @elseif (strpos($post->media_type, 'video') !== false)
                    <center>
                        <video height="150px" width="150px" controls>
                            <source src="{{ asset('storage/videos/' . $post->media) }}" type="{{ $post->media_type }}">
                            Your browser does not support the video tag.
                        </video>
                    </center>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->description }}</p>
                        <p class="card-text">{{ $post->price }} <span>Tsh</span></p>
                        @if(auth()->user()->role_id == 2)
                        @php
                            $seller = \App\Models\User::find($post->seller_id);
                        @endphp
                    
                        @if ($seller)
                        <div class="row">
                            <p class="card-text"> {{ $seller->name }}: {{ $seller->phone }}</p>
                            <a href="https://wa.me/{{ $seller->phone }}" class="btn btn-success" target="_blank">WhatsApp</a>
                       
                        </div>
                        @endif
                    @endif
                        @if(auth()->user()->role_id == 1)
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('posts.edit', $post->id) }}" method="GET" class="w-100">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm w-100">EDIT</button>
                                </form>
                            </div>
                            <div class="col">
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="w-100">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm w-100">Delete</button>
                                </form>
                            </div>
                        </div>
                        @endif
                    
                        @if(auth()->user()->role_id == 2)                    
                        <div class="row justify-content-center align-items-center g-2">
                            <input type="text" class="form-control quantity-input" placeholder="Quantity">
                            <input type="checkbox" class="form-check-input btn-check" id="select-{{ $post->id }}" data-post-id="{{ $post->id }}" data-seller-id="{{ $post->seller_id }}">
                            <label class="btn btn-outline-primary" for="select-{{ $post->id }}">ADD TO CART</label>
                        </div>
                        @endif
                    </div>
                    
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="cartItemsList">
                    <!-- Cart items will be dynamically added here -->
                </ul>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary save-cart-btn" type="submit" onclick="saveCart()">Save Cart</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

<script>
    function showCart() {
        let checkedItems = [];
        let checkboxes = document.getElementsByClassName('btn-check');
        for (let checkbox of checkboxes) {
            if (checkbox.checked) {
                let post = checkbox.closest('.card-body');
                let title = post.querySelector('.card-title').innerText;
                let description = post.querySelector('.card-text:nth-child(2)').innerText;
                let price = post.querySelector('.card-text:nth-child(3)').innerText; 
                let quantity = post.querySelector('.quantity-input').value; // Retrieve quantity value
    
                checkedItems.push(`<li>${title} - ${description} - ${price} - Quantity: ${quantity}</li>`);
            }
        }
        document.getElementById('cartItemsList').innerHTML = checkedItems.join('');
    }
    
    const csrfToken = "{{ csrf_token() }}";
    
    function saveCart() {
        let cartItems = [];
        let checkboxes = document.getElementsByClassName('btn-check');
        for (let checkbox of checkboxes) {
            if (checkbox.checked) {
                let post = checkbox.closest('.card-body');
                let title = post.querySelector('.card-title').innerText;
                let description = post.querySelector('.card-text:nth-child(2)').innerText;
                let priceText = post.querySelector('.card-text:nth-child(3)').innerText;
                let price = parseFloat(priceText.replace('Tsh', '').trim());
                let quantityText = post.querySelector('.quantity-input').value;
                let quantity = parseInt(quantityText);
                let sellerIdText = checkbox.getAttribute('data-seller-id');
                let sellerId = parseInt(sellerIdText);
    
                cartItems.push({
                    title: title,
                    description: description,
                    price: price,
                    quantity: quantity,
                    seller_id: sellerId
                });
            }
        }
    
        console.log("Cart Items:", cartItems); // Debugging: Log cart items
    
        // Send AJAX request to save cart items
        fetch("{{ route('cart.save') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                userId: "{{ Auth::id() }}", 
                cartItems: cartItems
            })
        })
        .then(response => {
            if (response.ok) {
                return response.json(); 
            } else {
                return response.json().then(data => {
                    throw new Error(data.error || 'Unknown error');
                });
            }
        })
        .then(data => {
            console.log(data);
            alert('Purchase successful.');
        })
        .catch(error => {
            console.error('Error saving cart items:', error.message);
            alert(error.message);
        });
    }
    </script>
    
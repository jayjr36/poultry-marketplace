<!-- resources/views/posts.blade.php -->

@extends('layout')
@section('content')
<div class="container">
    <h1>All Posts</h1>
    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#cartModal" onclick="showCart()">Show Cart</button>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/images/' . $post->image) }}" height="150px" width="150px" class="card-img-top"
                        alt="{{ $post->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->description }}</p>
                        <p class="card-text">Price: ${{ $post->price }}</p>
                        <div class="btn-group px-4" role="group">
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <input type="checkbox" class="form-check-input btn-check" id="select-{{ $post->id }}">
                            <label class="btn btn-outline-primary" for="select-{{ $post->id }}">ADD TO CART</label>
                        </div>
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
                <button class="btn btn-primary save-cart-btn">Save Cart</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  function showCart() {
        let checkedItems = [];
        let checkboxes = document.getElementsByClassName('btn-check');
        for (let checkbox of checkboxes) {
            if (checkbox.checked) {
                let post = checkbox.closest('.card-body');
                let title = post.querySelector('.card-title').innerText;
                let description = post.querySelector('.card-text').innerText;
                let price = post.querySelector('.card-text:nth-child(3)').innerText;
                let quantity = 1; // Default quantity
                let quantityInput = `<input type="number" class="form-control quantity-input" value="${quantity}" min="1">`;
                checkedItems.push(`<li>${title} - ${description} - ${price} - Quantity: ${quantityInput}</li>`);
            }
        }
        document.getElementById('cartItemsList').innerHTML = checkedItems.join('');
    }

        $(".save-cart-btn").click(function() {

            $.ajax({
                url: '/cart/save',
                method: 'POST',
                data: {
                    cart: JSON.stringify(cartItems)
                },
                success: function(response) {
                    alert('Cart saved to database successfully');
                }
            });
        });

        function saveCart() {
        let cartItems = [];
        let checkboxes = document.getElementsByClassName('select-checkbox');
        for (let checkbox of checkboxes) {
            if (checkbox.checked) {
                let post = checkbox.closest('.card-body');
                let title = post.querySelector('.card-title').innerText;
                let description = post.querySelector('.card-text').innerText;
                let price = parseFloat(post.querySelector('.card-text:nth-child(3)').innerText.replace(/\$/g, ''));
                let quantity = parseInt(post.querySelector('.quantity-input').value);
                cartItems.push({
                    title: title,
                    description: description,
                    price: price,
                    quantity: quantity
                });
            }
        }

        // Send AJAX request to save cart items
        fetch("{{ route('cart.save') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ cartItems: cartItems })
        })
        .then(response => {
            if (response.ok) {
                console.log('Cart items saved successfully.');
            } else {
                console.error('Failed to save cart items.');
            }
        })
        .catch(error => {
            console.error('Error saving cart items:', error);
        });
    }

</script>

<!-- resources/views/posts.blade.php -->

@extends('layout')

@section('content')
    <div class="container">
        <h1>All Posts</h1>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('storage/images/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
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
                                <form action="{{ route('cart.add', $post->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <button type="submit" class="btn btn-success">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
<script>
    // Example JavaScript to handle adding items to the cart
$('#addToCartForm').on('submit', function(event) {
    event.preventDefault();
    var postData = $(this).serialize();
    $.post('/cart/add', postData, function(response) {
        // Handle response (e.g., display success message, update cart modal)
        $('#cartModal').modal('show');
    });
});

// Example JavaScript to handle removing items from the cart
$('.remove-from-cart').on('click', function(event) {
    event.preventDefault();
    var itemId = $(this).data('item-id');
    $.post('/cart/remove', { item_id: itemId }, function(response) {
        // Handle response (e.g., remove item from cart modal)
        $('#cartModal').modal('show');
    });
});

</script>
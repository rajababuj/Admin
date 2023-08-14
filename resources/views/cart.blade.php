@extends('layouts.master')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h2 class="mb-0">
            <a href="">Home</a>
            <a href="">Cart</a>
        </h2>
    </div>
</div>
@section('content')
<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            @foreach($cartitems as $item)

            <div class="row">
                <div class="col-md-2">
                    <img src="{{ $item->products->image }}" width="100" height="100" {{ $item->products->id }}">


                </div>
                <div class="col-md-5">
                    <h3>{{ $item->products->name }}</h3>
                </div>
                <div class="col-md-3">
                    <input type="hidden" class="product_id" value="{{ $item->product_id }}">
                    <label for="Quality">quantity</label>
                    <div class="input-group text-center mb-3" style="width: 130px;">
                        <button class="input-group-text decrement-btn">-</button>
                        <input type="number" name="quantity" class="form-control qty-input text-center" value="{{ $item->quantity }}" min="1">
                        <button class="input-group-text increment-btn">+</button>
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-danger delete cart-item" data-product-id="{{ $item->product_id }}">
                        <i class="fa fa-trash">Remove</i>
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</section>
@endsection
@push('scripts')
<script>
    $(document).on('click', '.cart-item', function() {
        alert()
        const productId = $(this).data('product-id');
        const button = $(this);

        $.ajax({
            type: 'delete',
            url: "{{ route('remove-from-cart') }}",
            data: {
                product_id: productId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                button.closest('.row').remove();
                toastr.success('Product removed from cart.', 'Success');
            },
            error: function(data) {
                toastr.error('Error removing product from cart.', 'Error');
            }
        });
    });
</script>
@endpush
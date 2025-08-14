<div class="row listProduct-row listProduct-filter">
    @foreach ($products as $product)
    <div class="col-lg-3 col-md-6 col-6 product-loop" data-id="{{ $product->id }}">
        @include('site.products.product_item', ['product' => $product])
    </div>
    @endforeach
</div>
<div class="collection-loadmore text-center">
    {{ $products->links() }}
</div>

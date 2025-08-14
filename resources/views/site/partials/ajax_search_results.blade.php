
@foreach ($products as $product)
@php
$variant = $product->variants[0];
$img = @$variant->image->path ?? '';
$imageSecond = @$variant->galleries[0]->image->path ?? (@$variant->image->path ?? '');
@endphp
<div class="item-ult">
	<div class="thumbs">
		<a href="{{ route('front.show-product-detail', $product->slug) }}" title="{{ $product->name }}">
			<img alt="{{ $product->name }}" src="{{ $img }}">
		</a>
	</div>
	<div class="title">
		<a title="{{ $product->name }}" href="{{ route('front.show-product-detail', $product->slug) }}">{{ $product->name }}</a>
        @if($product->price > 0 && $product->base_price > 0)
		<p class="f-initial">{{ formatCurrency($product->price) }}₫
			@if($product->base_price > 0)
				<del>{{ formatCurrency($product->base_price) }}₫</del>
			@endif
		</p>
        @elseif($product->price > 0 && $product->base_price == 0)
        <p class="f-initial">{{ formatCurrency($product->price) }}₫</p>
        @elseif($product->price == 0 && $product->base_price > 0)
        <p class="f-initial">{{ formatCurrency($product->base_price) }}₫</p>
        @else
        <p class="f-initial">Liên hệ</p>
        @endif
	</div>
</div>
@endforeach

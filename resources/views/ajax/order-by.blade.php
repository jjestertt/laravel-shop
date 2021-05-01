@foreach($products as $product)
    @php
        $image = 'no_image.jpeg';
        if(count($product->images) > 0){
            $image = $product->images[0]['img'];
        };
    @endphp

    <!-- Product -->
    <div class="product">
        <div class="product_image">
            <a href="{{route('showProduct', ['category', $product->id])}}">
                <img src="images/{{$image}}" alt="">
            </a>
        </div>
        <div class="product_extra product_new">

            <a href="{{route('showCategory', $product->categories['alias'])}}">
                {{$product->categories['title']}}
            </a>
        </div>
        <div class="product_content">
            <div class="product_title">
                <a href="{{route('showProduct', ['category', $product->id])}}">
                    {{$product->title}}
                </a>
            </div>

            @if($product->new_price)
                <div class="product_price old_price">${{$product['price']}}</div>
                <div class="product_price new_price">${{$product['new_price']}}</div>
            @else
                <div class="product_price">${{$product['price']}}</div>
            @endif

        </div>
    </div>
@endforeach

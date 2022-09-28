@php

    $product = DB::table('products')
        ->where('products.category', '=', 'Snack')
        ->get();


@endphp

<span></span>
<section class='section card maxw1036'>
 
    <div class="products-stream">
        @for ($i = 0; $i < count($product); $i++)

            @php
                // HACK
                $name = explode('.', $product[$i]->img);
                $img = $name[0] . '.webp';
                
            @endphp


            <div class="fit-content margin-auto">
                <a href="/shop/item?id={{ $product[$i]->id }}"><img
                        src="../assets/images/products/medium/{{ $img }}"
                        alt="{{ $product[$i]->name }}"></a>
                <a class="" href="/shop/item?id={{ $product[$i]->id }}">
                    <p class="product-title">{{ $product[$i]->name }}</p>
                </a>
                <p>Weight: {{$product[$i]->weight}} {{$product[$i]->unit}}</p>

                @php
                    
                    $r = DB::table('reviews')
                        ->where('product', '=', $product[$i]->id)
                        ->avg('stars');
                    $avg_reviews = (int) round($r);
                    
                    $total_reviews = DB::table('reviews')
                        ->where('product', '=', $product[$i]->id)
                        ->count();
                @endphp

                @include('includes.stars')
            
                <p class="text-red">Original price: ${{ $product[$i]->price + 3}}</p>
                <form class="form-plan">
                    <select class="select-plan margin-top-zero" name="quantity">
                        <option invalid>Select Quantity</option>
                        <option selected value="1">Qty: 1</option>
                        <option value="2">Qty: 2</option>
                        <option value="3">Qty: 3</option>
                        <option value="4">Qty: 4</option>
                        <option value="5">Qty: 5</option>
                        <option value="6">Qty: 6</option>
                        <option value="7">Qty: 7</option>
                    </select>
                    <select class="select-plan margin-top-zero" data-product="{{ $product[$i]->id }}" data-price={{$product[$i]->price}} name="plan">
                        <option invalid>Select Subscription</option>
                        <option value="1" selected>${{ $product[$i]->price }} - Every month</option>
                        <option value="2">${{ $product[$i]->price + 1}} - Every 2 months</option>
                        <option value="3">${{ $product[$i]->price + 2}} - Every 3 months</option>
                        <option value="0">${{ $product[$i]->price + 3}} - One-time purchase</option>
                    </select>
                
                </form>
                <button data-quantity="1" data-name="{{ $product[$i]->name }}" data-plan="1" data-img="{{ $product[$i]->img }}" data-id="{{ $product[$i]->id }}" data-basePrice="{{$product[$i]->price }}" data-price="{{$product[$i]->price }}" class="cart-add button">ADD TO CART</button>
                
                

            </div>
        @endfor

    </div>
</section>
@include('includes.preorder-form')

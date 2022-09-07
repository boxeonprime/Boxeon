@php



$product = DB::table('products')
    ->whereIn('products.id', [47, 10, 8, 36, 9, 4, 48, 14, 26, 7, 41, 38, 53])
    ->get();

    $price = DB::table('products')
    ->whereIn('products.id', [47, 10, 8, 36, 9, 4, 48, 14, 26, 7, 41, 38, 53])
    ->sum("price");

   

@endphp

<span></span>


<div class="products-stream">
    @for ($i = 0; $i < count($product); $i++)
        @php
            // HACK
            $name = explode('.', $product[$i]->img);
            $img = $name[0] . '.jpeg';
            
        @endphp


        <div class="fit-content margin-auto">
            <a href="/shop/item?id={{ $product[$i]->id }}"><img src="../assets/images/products/medium/{{ $img }}"
                    alt="{{ $product[$i]->name }}"></a>
            <a class="" href="/shop/item?id={{ $product[$i]->id }}">
                <p class="product-title">{{ $product[$i]->name }}</p>
            </a>
            <p>Weight: {{ $product[$i]->weight }} {{ $product[$i]->unit }}</p>
            <p class="text-red">Original price: ${{ $product[$i]->price + 3}}</p>
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
            <br>

        </div>
    @endfor

</div>

@include('includes.preorder-form')

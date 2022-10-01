@php

if (isset($_GET['c'])) {
    $query = ucfirst($_GET['c']);

    $product = DB::table('products')
        ->where('category', '=', $query)
        ->get();
} else {
    $product = DB::table('products')
        ->where('products.category', '=', 'Staple')
        ->limit(9)
        ->get();
}

@endphp

<section class="r-float maxw250px">
   
    <div>
        @for ($i = 0; $i < count($product); $i++)


            <div class="maxw250px margin-auto">
                <a href="/shop/item?id={{ $product[$i]->id }}"><img class="maxw250px"
                        src="../assets/images/products/medium/{{ $product[$i]->img }}"
                        alt="{{ $product[$i]->name }}" loading="lazy"></a>
                <a class="" href="/shop/item?id={{ $product[$i]->id }}">
                    <p class="alt-product-title">{{ $product[$i]->name }}</p>
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
            
                @include('includes.plan-form')

            </div>
            <br>
        @endfor

    </div>
</section>
@include('includes.preorder-form')

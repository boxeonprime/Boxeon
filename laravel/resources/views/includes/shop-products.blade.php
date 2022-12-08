@php
    
    if (isset($_GET['c'])) {
        $query = ucfirst($_GET['c']);
    
        $product = DB::table('menu')
            ->where('category', '=', $query)
            ->get();
    } else {
        $product = DB::table('menu')
            ->limit(12)
            ->get();
    }
    
@endphp
<span></span>
<section class='section card maxw1036'>
    <h1 class="ginormous margin-bottom-zero">Weekly Menu</h1>
    <h3>Below is your menu for week ending January 7th 2023</h3>
    <div class="div-horizontal-rule"></div>
    <div id="products-stream" class="products-stream">

        @for ($i = 0; $i < count($product); $i++)
            <div class="fit-content margin-auto">

                <div class="recipes-stream margin-bottom-4-em">
                    <div class="p-relative menu-image-wrapper">
                        <span class="add-meal"><img src="{{ asset('../assets/images/add-circle.svg') }}"
                                alt="Add"></span>
                        <img width="320px" height="466px" src="../assets/images/products/medium/{{ $product[$i]->img }}"
                            loading="lazy" alt="">

                        <div class="bg-black-gradient">
                            <h2 class="title-style">{{ $product[$i]->name }}</h2>
                            <p>{{ $product[$i]->description }}</p>
                        </div>

                    </div>

                </div>
        @endfor

    </div>
</section>
@include('includes.preorder-form')

@extends('layouts.index')
@section('title', 'Boxeon.com African Foods Recipes')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
@section('content')
    <main>
        <section class='section rounded-corner card'>
            <h1 class="ginormous center primary-color pacifico">African Food Recipes</h1>

            <p class="centered">Don't know how to cook African foods? These African recipes will have you cooking like your Ancestors!</p>

            <div class="three-col-grid grid-gap-1-em">

                <div class="p-relative">
                    <a href="/school/recipe?r=egusi"> <img width="500px" src="../assets/images/egusi.jpeg"></a>

                    <a class="p-title" href="/school/recipe?r=egusi">
                        <h2 class="title-style"><span class="title-style-span">Best Nigerian Egusi Soup</span></h2>
                    </a>

                </div>
                <div class="p-relative">
                    <a href="/school/recipe?r=ata"> <img width="500px" src="../assets/images/ata.jpeg"></a>

                    <a class="p-title" href="/school/recipe?r=ata">
                        <h2 class="title-style"><span class="title-style-span">Nigerian Ata Dindin / Ata Rice</h2>
                    </a>

                </div>

                <div class="p-relative">

                    <a href="/school/recipe?r=chix"><img width="500px" src="../assets/images/chix.jpeg"></a>


                    <a class="p-title" href="/school/recipe?r=chix">
                        <h2 class="title-style"><span class="title-style-span">Best Nigerian Chicken Stew</h2>
                    </a>

                </div>

                <div class="p-relative">
                    <a href="/school/recipe?r=jollof"><img width="500px" src="../assets/images/jollof.webp"></a>

                    <a class="p-title" href="/school/recipe?r=jollof">
                        <h2 class="title-style"><span class="title-style-span">Perfect Party Jollof Rice</h2>
                    </a>

                </div>
                <div class="p-relative">
                    <a href="/school/recipe?r=psoup"><img width="500px" src="../assets/images/psoup.jpeg"></a>

                    <a class="p-title" href="/school/recipe?r=psoup">
                        <h2 class="title-style"><span class="title-style-span">Delecious Nigerian Pepper Soup</h2>
                    </a>

                </div>
                <div class="p-relative">
                    <a href="/school/recipe?r=okra"><img width="500px" src="../assets/images/okra.jpeg"></a>

                    <a class="p-title" href="/school/recipe?r=okra">
                        <h2 class="title-style"><span class="title-style-span">Perfect Nigerian Okra Soup</h2>
                    </a>

                </div>

                <div class="p-relative">
                    <a href="/school/recipe?r=oilless"><img width="500px" src="../assets/images/oilless.jpeg"></a>

                    <a class="p-title" href="/school/recipe?r=oilless">
                        <h2 class="title-style"><span class="title-style-span">Oilless Okra Soup</h2>
                    </a>

                </div>

                <div class="p-relative">
                    <a href="/school/recipe?r=sbeef"><img width="500px" src="../assets/images/suya.jpeg"></a>

                    <a class="p-title" href="/school/recipe?r=sbeef">
                        <h2 class="title-style"><span class="title-style-span">Delicious Nigerian Suya Beef</h2>
                    </a>
                </div>
                <div class="p-relative">
                    <a href="/school/recipe?r=hbp"><img width="500px" src="../assets/images/honey.jpeg"></a>

                    <a class="p-title" href="/school/recipe?r=hbp">
                        <h2 class="title-style"><span class="title-style-span">Irresistible Honey Beans Porridge</h2>
                    </a>

                </div>
                <div class="p-relative">
                    <a href="/school/recipe?r=abb"><img width="500px" src="../assets/images/abbs.jpeg"></a>

                    <a class="p-title" href="/school/recipe?r=abb">
                        <h2 class="title-style"><span class="title-style-span">Easy African Black Beans Stew</h2>
                    </a>

                </div>
                <div class="p-relative">
                    <a href="/school/recipe?r=fufu"><img width="500px" src="../assets/images/fufu.webp"></a>

                    <a class="p-title" href="/school/recipe?r=fufu">
                        <h2 class="title-style"><span class="title-style-span">Traditonal Cassava Fufu</h2>
                    </a>

                </div>
                <div class="p-relative">
                    <a href="/school/recipe?r=sorrel"><img width="500px" src="../assets/images/sorrel.jpeg"></a>

                    <a class="p-title" href="/school/recipe?r=sorrel">
                        <h2 class="title-style"><span class="title-style-span">Sobo Drink</h2>
                    </a>

                </div>

            </div>

        </section>


    </main>

@endsection

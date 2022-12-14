@extends('layouts.index')
@section('title', 'African Recipes And Food Delivery | Boxeon')
@section('og:image', asset('../assets/images/logo_square.png'))
@section('og:image:alt', asset('../assets/images/logo_square2.png'))
@section('keywords',
    'Boxeon, African Subscription Box, African Snack Box, Nigerian Cuisine, Caribbean Foods, African
    Food Recipes')
@section('description',
    'Boxeon is an African food and meal kit delivery service helping the diaspora automate and
    repatriate their grocery shopping. We specialize in African and Caribbean foods and deliver nationwide. Get 16 free
    foods - this offer ends soon.')
@section('content')

    <main>
        <section class='section maxw1035 rounded-corner card'>
            <div class="recipes-stream">

                <div class="p-relative">
                    <a href="/recipe/moin-moin"><img width="320px" height="466px"
                            src="../assets/images/products/medium/moin-moin.webp" alt="Nigerian Moin Moin"></a>

                    <div class="bg-black-gradient"> <a class="p-title one-em-font" href="/recipe/moin-moin">
                           <h2>Savory Bean Pudding</h2>
                        </a>
                    </div>

                </div>
                <div class="p-relative">
                    <a href="/recipe/nigerian-egusi-soup"><img width="320px" height="466px"
                            src="../assets/images/products/medium/egusi.webp" alt="Nigerian Egusi Soup"></a>
                    <div class="bg-black-gradient"> <a class="p-title one-em-font" href="/recipe/nigerian-egusi-soup">
                           <h2>Creamy Egusi Soup</h2>
                        </a>
                    </div>
                </div>
                <div class="p-relative">
                    <a href="/recipe/nigerian-ata-dindin"><img width="320px" height="466px"
                            src="../assets/images/products/medium/ata.webp" loading="lazy" alt=""></a>
                    <div class="bg-black-gradient"> <a class="p-title one-em-font" href="/recipe/nigerian-ata-dindin">
                           <h2>Spicy Ata Dindin</h2>
                        </a>
                    </div>
                </div>
                <div class="p-relative">
                    <a href="/recipe/nigerian-chicken-stew"><img width="320px" height="466px"
                            src="../assets/images/products/medium/chix.webp" loading="lazy" alt="Nigerian Chicken Stew"></a>
                    <div class="bg-black-gradient"> <a class="p-title one-em-font" href="/recipe/nigerian-chicken-stew">
                           <h2>Hearty Chicken Stew</h2>
                        </a>
                    </div>
                </div>
                <div class="p-relative">
                    <a href="/recipe/party-jollof-rice"><img width="320px" height="466px"
                            src="../assets/images/products/medium/jollof.webp" loading="lazy"
                            alt="Nigerian Jollof Rice"></a>
                    <div class="bg-black-gradient"> <a class="p-title one-em-font" href="/recipe/party-jollof-rice">
                           <h2>Fete Jollof Rice</h2>
                        </a>
                    </div>
                </div>
                <div class="p-relative">
                    <a href="/recipe/cassava-fufu"><img width="320px" height="466px"
                            src="../assets/images/products/medium/fufu.webp" loading="lazy" alt="Traditional Fufu"></a>
                    <div class="bg-black-gradient"> <a class="p-title one-em-font" href="/recipe/cassava-fufu">
                            <h2>Smooth Cassava Fufu</h2>
                        </a>
                    </div>
                </div>
                <div class="p-relative">
                    <a href="/recipe/nigerian-sobo-drink"><img width="320px" height="466px"
                            src="../assets/images/products/medium/sobo.webp" loading="lazy" alt="Hibiscus Flowers Tea"></a>
                    <div class="bg-black-gradient"> <a class="p-title one-em-font" href="/recipe/nigerian-sobo-drink">
                           <h2>Virgin Hibiscus Cocktail</h2>
                        </a>
                    </div>
                </div>
                <div class="p-relative">
                    <a href="/recipe/nigerian-pepper-soup"><img width="320px" height="466px"
                            src="../assets/images/products/medium/psoup.webp" loading="lazy" alt="Nigerian Pepper Soup"></a>
                    <div class="bg-black-gradient"> <a class="p-title one-em-font" href="/recipe/nigerian-pepper-soup">
                           <h2>Nutty Pepper Soup</h2>
                        </a>
                    </div>
                </div>
                <div class="p-relative">
                    <a href="/recipe/nigerian-okra-soup"><img width="320px" height="466px"
                            src="../assets/images/products/medium/okra.webp" loading="lazy" alt="Okra Soup"></a>
                    <div class="bg-black-gradient"> <a class="p-title one-em-font" href="/recipe/nigerian-okra-soup">
                           <h2>Garlic Seafood Gumbo</h2>
                        </a>
                    </div>
                </div>
                <div class="p-relative">
                    <a href="/recipe/plantain-wode-maya"><img width="320px" height="466px"
                            src="../assets/images/products/medium/oilless.webp" loading="lazy" alt="Low Fat Okra Soup"></a>
                    <div class="bg-black-gradient"> <a class="p-title one-em-font" href="/recipe/plantain-wode-maya">
                           <h2>Vanilla Plantain Flamb??</h2>
                        </a>
                    </div>
                </div>
                <div class="p-relative">
                    <a href="/recipe/nigerian-suya-beef"><img width="320px" height="466px"
                            src="../assets/images/products/medium/suya.webp" loading="lazy" alt="Nigerian Suya Beef"></a>
                    <div class="bg-black-gradient"> <a class="p-title one-em-font" href="/recipe/nigerian-suya-beef">
                           <h2>Braised Suya Beef</h2>
                        </a>
                    </div>
                </div>
                <div class="p-relative">
                    <a href="/recipe/honey-beans-porridge"><img width="320px" height="466px"
                            src="../assets/images/products/medium/honey.webp" loading="lazy"
                            alt="Nigerian Honey Beans Porridge"></a>
                    <div class="bg-black-gradient"> <a class="p-title one-em-font" href="/recipe/honey-beans-porridge">
                           <h2>Honey Beans Pottage</h2>
                        </a>
                    </div>
                </div>
                <div class="p-relative">
                    <a href="/recipe/black-beans-stew"><img width="320px" height="466px"
                            src="../assets/images/products/medium/abbs.webp" loading="lazy"
                            alt="African Black Beans Stew"></a>
                    <div class="bg-black-gradient"> <a class="p-title one-em-font" href="/recipe/black-beans-stew">
                           <h2>Smokey Black Beans Stew</h2>
                        </a>
                    </div>
                </div>
                <div class="p-relative">
                    <a href="/recipe/lobster-egusi-bisque"><img width="320px" height="466px"
                            src="../assets/images/products/medium/lobster-egusi-bisque.webp" loading="lazy"
                            alt="Lobster Egusi Bisque"></a>
                    <div class="bg-black-gradient"> <a class="p-title one-em-font" href="/recipe/lobster-egusi-bisque">
                           <h2>Lobster Egusi Bisque</h2>
                        </a>
                    </div>
                </div>
                <div class="p-relative">
                    <a href="/recipe/nigerian-ogbono-soup"><img width="320px" height="466px"
                            src="../assets/images/products/medium/ogbono-soup.webp" loading="lazy"
                            alt="Nigerian Ogbono Soup"></a>
                    <div class="bg-black-gradient"> <a class="p-title one-em-font" href="/recipe/nigerian-ogbono-soup">
                           <h2>Bold Ogbono Soup</h2>
                        </a>
                    </div>
                </div>
                <!--
           <br>
                <h2 class="margin-bottom-zero">Caribbean Cuisine Delicacies</h2>
               <h2>Soul food and African cuisine fusing are much more than a combination of the best-tasting cuisines in the world - it is a unification of formerly broken hearts, minds, and souls. More and more Black families cook these with their children while teaching them positive aspects of their history and culture, so that they will be empowered by that knowledge whenever they enjoy these meals.</h2>
                <div class="sharethis-inline-share-buttons margin-bottom-2-em"></div>
                !-->
        </section>
    </main>

@endsection

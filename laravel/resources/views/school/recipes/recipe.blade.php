<section id="blogs-stream" class='section maxw1035 two-col-grid rounded-corner card'>

    <div>

        <div>
            <h1 class="blog-title font-size-3-em">{{ $meta->short_title }}</h1>
            <p><span><img id="author" width="30px" height="30px" src='{{ asset('../assets/images/me.webp') }}'
                        alt="Trevor Prime" /></span> Chef Trevor Prime &nbsp; &nbsp; Published September 21 2022</p><br>
            <div class="sharethis-inline-share-buttons margin-bottom-2-em"></div>

            <picture>
                <source media="(max-width: 650px)" srcset="../assets/images/products/medium/{{ $content->img }}">
                <source media="(max-width: 465px)" srcset="../assets/images/products/medium/{{ $content->img }}">
                <img class="w100per margin-bottom-2-em" width="640px" height="423px"
                    src="../assets/images/products/{{ $content->img }}" loading="lazy" alt="{{ $content->title }}">
            </picture>

            <p>{{ $content->p1 }}</p>
            <p>{{ $content->p2 }}</p>
            <br>
            <div class="table-of-contents">
                <h2>Contents</h2>
                <ol>

                    @foreach ($content->text->tableOfContents as $item)
                        <li><a class="one-em-font primary-color" href="#abb1">{{ $item }}</a> </li>
                    @endforeach

                </ol>

            </div>

            <h2 class="primary-color extra-large-font">{{ $content->text->content->h2 }}</h2>

            @foreach ($content->text->content->paragraphs as $paragraph)
                <p>{{ $paragraph }}
                <p>
            @endforeach

            <h2 class="primary-color extra-large-font" id="abb2">{{ $content->text->li2->h2 }}</h2>

            @foreach ($content->text->li2->paragraphs as $paragraph)
                <p>{{ $paragraph }}
                <p>
            @endforeach
            <h2>{{ $content->text->li3->h2 }}</h2>
            <p>This&nbsp;{{ $meta->short_title }}&nbsp; calls for specific African ingredients that you can purchase
                right here on <a class="one-em-font" href="../shop/index?c=staple">Boxeon</a>.</p>

            <div class="table-of-contents">
                @if (isset($content->text->li3->h41))
                    <h4>{{ $content->text->li3->h41 }}</h4>
                @endif

                <ul>
                    @foreach ($content->text->li3->recipe->recipe1 as $items)
                        <li>
                            <form><input type="checkbox" id="{{ $items }}" name="1"><label
                                    for="{{ $items }}">{{ $items }}</label>
                            </form>
                        </li>
                    @endforeach
                </ul>
                @if (isset($content->text->li3->recipe->recipe2))
                    @if (isset($content->text->li3->h42))
                        <h4>{{ $content->text->li3->h42 }}</h4>
                    @endif
                    <ul>
                        @foreach ($content->text->li3->recipe->recipe2 as $items)
                            <li>
                                <form><input type="checkbox" id="{{ $items }}" name="1"><label
                                        for="{{ $items }}">{{ $items }}</label>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <h2 class="primary-color extra-large-font">{{ $content->text->li4->h2 }}</h2>
            <p>Like my beloved grandma always said, love, is the most important ingredient in African ancestral cooking.
                This means we should take our time, relax, put away our smartphones, and cook with care.</p>
            <div class="table-of-contents">
                <ul>
                    @foreach ($content->text->li4->instructions as $items)
                        <li>
                            <form><input type="checkbox" id="{{ $items }}" name="1"><label
                                    for="{{ $items }}">{{ $items }}</label></form>
                        </li>
                    @endforeach

                </ul>
            </div>
            <h2>Video instructions</h2>
            <p>Watch this video for clear instructions on how to make this
                delicious&nbsp;{{ $meta->short_title }}&nbsp;recipe:</p>
            <div id="video">
                <iframe width="560" height="315" loading="lazy"
                    src="https://www.youtube.com/embed/{{ $content->videoID }}" title="{{ $content->text->li3->h2 }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; 
                    clipboard-write; encrypted-media; 
                    gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <br>
            @if (isset($content->text->li5->h2))
            <h2>{{ $content->text->li5->h2 }}</h2>
            @foreach ($content->text->li5->paragraphs as $paragraph)
                <p>{{ $paragraph }}
                <p>
            @endforeach
            @endif
            @if (isset($content->text->li6->h2))
                <h2>{{ $content->text->li6->h2 }}</h2>
                @foreach ($content->text->li6->paragraphs as $paragraph)
                    <p>{{ $paragraph }}
                    <p>
                @endforeach
            @endif
            @if (isset($content->text->li7->h2))
            <h2>{{ $content->text->li7->h2 }}</h2>
            @foreach ($content->text->li7->paragraphs as $paragraph)
                <p>{{ $paragraph }}
                <p>
            @endforeach
            @endif
            @if (isset($content->text->li8->h2))
            <h2>{{ $content->text->li8->h2 }}</h2>
            @foreach ($content->text->li8->paragraphs as $paragraph)
                <p>{{ $paragraph }}
                <p>
            @endforeach
            @endif
            @if (isset($content->text->li9->h2))
            <h2>{{ $content->text->li9->h2 }}</h2>
            @foreach ($content->text->li9->paragraphs as $paragraph)
                <p>{{ $paragraph }}
                <p>
            @endforeach
            @endif
            @if (isset($content->text->li10->h2))
            <h2>{{ $content->text->li10->h2 }}</h2>
            @foreach ($content->text->li10->paragraphs as $paragraph)
                <p>{{ $paragraph }}
                <p>
            @endforeach
            @endif

            @include('includes.comments')

            @include('includes.recipes-stream')

        </div>
    </div>

    <section>

        @include('includes.sidebar-products')

    </section>

</section>
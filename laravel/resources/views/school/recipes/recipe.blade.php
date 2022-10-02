<section id="blogs-stream" class='section maxw1035 two-col-grid rounded-corner card'>

    <div>

        <div>
            <h1 class="blog-title font-size-3-em">{{ $content->title }}</h1>
            <p>By Trevor Prime &nbsp; &nbsp; Published September 21 2022</p><br>
            <div class="sharethis-inline-share-buttons margin-bottom-2-em"></div>

            <picture>
                <source media="(max-width: 650px)" srcset="../assets/images/products/medium/{{ $content->img }}">
                <source media="(max-width: 465px)" srcset="../assets/images/products/medium/{{ $content->img }}">
                <img class="w100per margin-bottom-2-em" width="640px" height="932px" src="../assets/images/products/{{ $content->img }}" loading="lazy"
                    alt="Hibiscus Flowers Tea">
            </picture>

            <p>{{ $content->p1 }}</p>
            <p>{{ $content->p2 }}</p>
            <br>
            <div class="table-of-contents">
                <h2>Inside this Article</h2>
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
            <div class="table-of-contents">
                @if ($content->text->li3->h41)
                    <h4>{{ $content->text->li3->h41 }}</h4>
                @endif
                <ul>
                    @foreach ($content->text->li3->recipe->recipe1 as $items)
                        <li>
                            <form><input type="checkbox" id="{{ $items }}" name="1"><label for="{{ $items }}">{{ $items }}</label>
                            </form>
                        </li>
                    @endforeach
                </ul>
                @if ($content->text->li3->recipe->recipe2)
                    @if ($content->text->li3->h42)
                        <h4>{{ $content->text->li3->h42 }}</h4>
                    @endif
                    <ul>
                        @foreach ($content->text->li3->recipe->recipe2 as $items)
                            <li>
                                <form><input type="checkbox" id="{{ $items }}" name="1"><label for="{{ $items }}">{{ $items }}</label>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <h2 class="primary-color extra-large-font">{{ $content->text->li4->h2 }}</h2>
            <div class="table-of-contents">
                <ul>
                    @foreach ($content->text->li4->instructions as $items)
                        <li>
                            <form><input type="checkbox" id="{{ $items }}" name="1"><label for="{{ $items }}">{{ $items }}</label></form>
                        </li>
                    @endforeach

                </ul>
            </div>

            <div id="video">
                <iframe width="560" height="315" loading="lazy"
                    src="https://www.youtube.com/embed/{{ $content->videoID }}" 
                    title="{{ $content->text->li3->h2 }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; 
                    clipboard-write; encrypted-media; 
                    gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <br>
            <h2>{{ $content->text->li5->h2 }}</h2>

            @foreach ($content->text->li5->paragraphs as $paragraph)
                <p>{{ $paragraph }}
                <p>
            @endforeach

            <h2>{{ $content->text->li6->h2 }}</h2>
            @foreach ($content->text->li6->paragraphs as $paragraph)
                <p>{{ $paragraph }}
                <p>
            @endforeach


            <h2>{{ $content->text->li7->h2 }}</h2>
            @foreach ($content->text->li7->paragraphs as $paragraph)
                <p>{{ $paragraph }}
                <p>
            @endforeach

            <h2>{{ $content->text->li8->h2 }}</h2>
            @foreach ($content->text->li8->paragraphs as $paragraph)
                <p>{{ $paragraph }}
                <p>
            @endforeach

            <h2>{{ $content->text->li9->h2 }}</h2>
            @foreach ($content->text->li9->paragraphs as $paragraph)
                <p>{{ $paragraph }}
                <p>
            @endforeach
            <h2>{{ $content->text->li10->h2 }}</h2>
            @foreach ($content->text->li10->paragraphs as $paragraph)
                <p>{{ $paragraph }}
                <p>
            @endforeach
            <br>

            @include('includes.comments')

            @include('includes.recipes-stream')

        </div>
    </div>

    <section>

        @include('includes.sidebar-products')

    </section>

</section>

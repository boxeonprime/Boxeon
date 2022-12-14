<section id="blogs-stream" class='section maxw1035 two-col-grid rounded-corner card'>

    <div>

        <div>
            <h1 class="blog-title font-size-3-em">{{ $meta->short_title }}</h1>
            <p class="p-author"><span><img id="author" width="30px" height="30px"
                        src='{{ asset('../assets/images/me.webp') }}' alt="Trevor Prime" /></span> Chef Trevor Prime
                &nbsp; &nbsp; Published September 21 2022</p><br>
            <div class="sharethis-inline-share-buttons margin-bottom-2-em"></div>
            <picture>
                <source media="(max-width: 650px)" srcset="../assets/images/products/medium/{{ $content->img }}">
                <source media="(max-width: 465px)" srcset="../assets/images/products/medium/{{ $content->img }}">
                <img class="fixed-w100per margin-bottom-2-em" width="640px" height="423px"
                    src="../assets/images/products/{{ $content->img }}" alt="{{ $content->title }}">
            </picture>

            <p>{{ $content->p1 }}</p>
            <p>{{ $content->p2 }}</p>
            <br>
            <div class="table-of-contents">
                <h2>Contents</h2>
                <ol>
                    @php $count = 0; @endphp
                    @foreach ($content->text->tableOfContents as $items)
                        @foreach ((array) $items as $item)
                            @php $count++ @endphp
                            <li><a class="one-em-font primary-color"
                                    href="#jump{{ $count }}">{{ $item }}</a> </li>
                        @endforeach
                    @endforeach

                </ol>

            </div>

            <h2 class="primary-color extra-large-font" id="jump1">{{ $content->text->content->h2 }}</h2>
            @php $parent = 0; @endphp
            @foreach ($content->text->content->paragraphs as $paragraph)
                <p>{{ $paragraph }}
                <p>
                    @php
                        $section = 'hb';
                        $parent++;
                    @endphp
                    @include('school.recipes.inserted')
            @endforeach

            <h2 class="primary-color extra-large-font" id="jump2">{{ $content->text->li2->h2 }}</h2>
            @php $parent = 0; @endphp
            @foreach ($content->text->li2->paragraphs as $paragraph)
                <p>{{ $paragraph }}
                <p>
                    @php
                        $section = 'preg';
                        $parent++;
                    @endphp
                    @include('school.recipes.inserted')
            @endforeach

        
            @if (isset($content->text->li7->h2))
                <h2 id="jump7">{{ $content->text->li7->h2 }}</h2>
                @php $parent = 0; @endphp
                @foreach ($content->text->li7->paragraphs as $paragraphs)
                    @foreach ((array) $paragraphs as $paragraph)
                        <p>{{ $paragraph }}
                        <p>
                            @php
                                $section = 'si';
                                $parent++;
                            @endphp
                            @include('school.recipes.inserted')
                    @endforeach
                @endforeach
            @endif
            @if (isset($content->text->li8->h2))
                <h2 id="jump8">{{ $content->text->li8->h2 }}</h2>
                @php $parent = 0; @endphp
                @foreach ($content->text->li8->paragraphs as $paragraphs)
                    @foreach ((array) $paragraphs as $paragraph)
                        <p>{{ $paragraph }}
                        <p>
                            @php
                                $section = 'pe';
                                $parent++;
                            @endphp
                            @include('school.recipes.inserted')
                    @endforeach
                @endforeach
            @endif
            @if (isset($content->text->li9->h2))
                <h2 id="jump9">{{ $content->text->li9->h2 }}</h2>
                @php $parent = 0; @endphp
                @foreach ($content->text->li9->paragraphs as $paragraphs)
                    @foreach ((array) $paragraphs as $paragraph)
                        <p>{{ $paragraph }}
                        <p>
                            @php
                                $section = 'wh';
                                $parent++;
                            @endphp
                            @include('school.recipes.inserted')
                    @endforeach
                @endforeach
            @endif
            @if (isset($content->text->li10->h2))
                <h2 id="jump10">{{ $content->text->li10->h2 }}</h2>
                @php $parent = 0; @endphp
                @foreach ($content->text->li10->paragraphs as $paragraphs)
                    @foreach ((array) $paragraphs as $paragraph)
                        <p>{{ $paragraph }}
                        <p>
                            @php
                                $section = 'c';
                                $parent++;
                            @endphp
                            @include('school.recipes.inserted')
                    @endforeach
                @endforeach
            @endif

            @include('includes.comments')

        </div>
    </div>
    @desktop
        <section>

            @include('includes.sidebar-products')

        </section>
    @enddesktop

    @tablet
        <section>

            @include('includes.sidebar-products')

        </section>
    @endtablet



</section>

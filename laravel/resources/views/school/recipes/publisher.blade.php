<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">

<head>
    <title>@yield('title', config('app.name'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('../assets/images/favicon.webp') }}">
    <link rel="alternate icon" href="{{ asset('../assets/images/favicon.webp') }}">
    <link rel="mask-icon" href="https://boxeon.com/images/favicon.webp" color="#fff">
    <link rel="stylesheet" href="{{ asset('../assets/css/style.css?v=37') }}">
    <link rel="stylesheet" href="{{ asset('../assets/css/forms.css?v=35') }}">
    <link defer rel="stylesheet" href="{{ asset('../css/app.css') }}">
    <link rel="stylesheet" media="screen and (min-width: 200px) and (max-width: 1810px)"
        href="{{ asset('../assets/css/mobile.css?v=3.6') }}" />
    <script defer src="{{ asset('../assets/js/global.js?v=2.1') }}"></script>
    <script defer src="{{ asset('../assets/js/publisher.js') }}"></script>
</head>

<body id='index'>
    @if (session()->has('message'))
        <dialog class="alert">
            <p class='centered'> {{ session()->get('message') }}</p>
        </dialog>
    @endif
    <div id="container">
        <main id="publish">
            <section class="section maxw600px rounded-corner card">
                <form class="font-size-1-5-em" action="{{ url('/publish/getblog') }}" method="post" class="r-float">
                    @csrf
                    <fieldset>
                        <h2 class="text-black">1. Start</h2>
                        <p class="one-em-font">Start by making a selection in this drop down list then clicking Start.
                            Scroll
                            down and begin working.</p>
                        <select name="id">
                            <option invalid>Select Action (Required)</option>
                            <option value="">WRITE: New Blog</option>
                            @if (isset($blog))
                                @foreach ($blog as $item)
                                    <option value="{{ $item->id }}">{{ 'EDIT: ' . $item->short_title }}</option>
                                @endforeach
                            @endif
                        </select>
                        <input type="submit" value="START">
                    </fieldset>

                    <div class="div-horizontal-rule"></div>

                </form>
                @if (isset($blog))
                    <form class="font-size-1-5-em" action="{{ route('blog.save') }}" method="post" name="blog"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $edit->id ?? '' }}">
                        <fieldset>
                            <h2 class="text-black">2. Compose</h2>
                            <p class="one-em-font">Create your composition in the form below. Below some form fields,
                                links
                                allows you to add or remove fields. The plus (+) sign before each link indicates that,
                                that link
                                will add a new field. The opposite is true when the link contains a minus (-) sign
                                before it.
                            </p>
                            <br>
                            <h2>Titles</h2>

                            <input maxlength="255" type="text" name="title" value="{{ $json->title ?? '' }}"
                                placeholder="Title (max 10 words)">
                            <input maxlength="250" type="text" name="short_title"
                                value="{{ $edit->short_title ?? '' }}" placeholder="Short Title (Max 3 words)">

                        </fieldset>
                        <fieldset>
                            <h2>Opening Paragraphs</h2>

                            <textarea required name="p1" col="45" rows="8" placeholder="(Paragraph)">{{ $json->p1 ?? '' }}</textarea>
                            <textarea required name="p2" col="45" rows="8" placeholder="(Paragraph)">{{ $json->p2 ?? '' }}</textarea>

                        </fieldset>

                        <fieldset>
                            <h2>Table of contents</h2>
                            @if (isset($json->text->tableOfContents))
                                @foreach ($json->text->tableOfContents as $items)
                                    @foreach ((array) $items as $item)
                                        <div>
                                            <input type="text" name="topics[]" value="{{ $item ?? '' }}"
                                                placeholder="(Topic)">
                                            <div>
                                                <a href="#/" data-type-id="add-topic" onclick="createItem(this)"
                                                    class="add-field point-7-em-font">+Topic</a> &nbsp;|&nbsp;
                                                <a href="#/" data-type-id="remove-topic"
                                                    onclick="removeTopic(this)"
                                                    class="remove-field point-7-em-font">-Topic</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            @else
                                <div>
                                    <input type="text" name="topics[]" value="" placeholder="Topic">
                                    <div>
                                        <a href="#/" data-type-id="add-topic" onclick="createItem(this)"
                                            class="add-field point-7-em-font">+Topic</a> &nbsp;|&nbsp;
                                        <a href="#/" data-type-id="remove-top" onclick="removeTopic(this)"
                                            class="remove-field point-7-em-font">-Topic</a>
                                    </div>
                                </div>
                            @endif

                        </fieldset>

                        <fieldset>
                            <h2>Health Benefits</h2>
                            @if (isset($json->text->content->paragraphs))
                                @php $parent = 0; @endphp
                                @foreach ($json->text->content->paragraphs as $paragraph)
                                    @php
                                        $section = 'hb';
                                        $parent++;
                                    @endphp
                                    <div>
                                        <textarea required name="hb[]" col="45" rows="8" placeholder="(Paragraph)">{{ $paragraph ?? '' }}</textarea>
                                        @include('school.recipes.editor')
                                    </div>
                                    @include('school.recipes.inserts')
                                @endforeach
                            @else
                                @php
                                    $parent = 0;
                                @endphp

                                @for ($loop = 0; $loop < 2; $loop++)
                                    @php
                                        $section = 'hb';
                                        $parent++;
                                    @endphp
                                    <div>
                                        <textarea required name="hb[]" col="45" rows="8" placeholder="(Paragraph)"></textarea>
                                        @include('school.recipes.editor')
                                    </div>
                                    @include('school.recipes.inserts')
                                @endfor
                            @endif

                        </fieldset>

                        <fieldset>
                            <h2>Pregnant women</h2>
                            @if (isset($json->text->li2->paragraphs))
                                @php $parent = 0; @endphp
                                @foreach ($json->text->li2->paragraphs as $paragraph)
                                    @php
                                        $section = 'preg';
                                        $parent++;
                                    @endphp
                                    <div>
                                        <textarea required name="preg[]" col="45" rows="8">{{ $paragraph ?? '' }}</textarea>
                                        @include('school.recipes.editor')
                                    </div>
                                    @include('school.recipes.inserts')
                                @endforeach
                            @else
                                @php
                                    $parent = 0;
                                @endphp

                                @for ($loop = 0; $loop < 2; $loop++)
                                    @php
                                        $section = 'preg';
                                        $parent++;
                                    @endphp
                                    <div>
                                        <textarea required name="preg[]" col="45" rows="8" placeholder="(Paragraph)"></textarea>
                                        @include('school.recipes.editor')
                                    </div>
                                    @include('school.recipes.inserts')
                                @endfor
                            @endif

                        </fieldset>

                        <fieldset>

                            <h2>Recipe</h2>

                            @if (isset($json->text->li3->recipe->recipe1))
                                @php $parent = 0; @endphp
                                @if (isset($json->text->li3->h41))
                                    <input type="text" name="rech4[]" value="{{ $json->text->li3->h41 }}">
                                @endif
                                @foreach ($json->text->li3->recipe->recipe1 as $items)
                                    @php
                                        $section = 'rec';
                                        
                                    @endphp
                                    @foreach ((array) $items as $item)
                                        <div>
                                            <input type="text" name="rec[]" value="{{ $item ?? '' }}"
                                                required placeholder="((Measurement and ingredient))">
                                            <div>
                                                <a href="#/" data-type-id="add-in" onclick="createItem(this)"
                                                    class="add-field point-7-em-font">+Ingredient</a> &nbsp;|&nbsp;
                                                <a href="#/" data-type-id="remove-in"
                                                    onclick="removeTopic(this)"
                                                    class="remove-field point-7-em-font">-Ingredient</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            @else
                                @php
                                    $section = 'rec';
                                    
                                @endphp
                                <div>
                                    <input type="text" name="rec[]" value="" required
                                        placeholder="(Measurement and ingredient)">
                                    <a href="#/" data-type-id="add-in" onclick="createItem(this)"
                                        class="add-field point-7-em-font">+Ingredient</a> &nbsp;|&nbsp;
                                    <a href="#/" data-type-id="remove-in" onclick="removeTopic(this)"
                                        class="remove-field point-7-em-font">-Ingredient</a>
                                </div>
                                <div>
                                    <input type="text" name="rec[]" value="" required
                                        placeholder="(Measurement and ingredient)">
                                    <div>
                                        <a href="#/" data-type-id="add-in" onclick="createItem(this)"
                                            class="add-field point-7-em-font">+Ingredient</a> &nbsp;|&nbsp;
                                        <a href="#/" data-type-id="remove-in" onclick="removeTopic(this)"
                                            class="remove-field point-7-em-font">-Ingredient</a>
                                    </div>
                                </div>
                            @endif

                            @if (isset($json->text->li3->recipe->recipe2))
                                @if (isset($json->text->li3->h42))
                                    <div>
                                        <input type="text" name="rech4[]" value="{{ $json->text->li3->h42 }}">
                                        <div>
                                            <a href="#/" data-type-id="add-in" onclick="createItem(this)"
                                                class="add-field point-7-em-font">+Ingredient</a> &nbsp;|&nbsp;
                                            <a href="#/" data-type-id="remove-in" onclick="removeTopic(this)"
                                                class="remove-field point-7-em-font">-Ingredient</a>
                                        </div>
                                    </div>
                                @endif
                                @foreach ($json->text->li3->recipe->recipe2 as $items)
                                    @foreach ((array) $items as $item)
                                        <div>
                                            <input placeholder="(Measurement and ingredient)" required type="text"
                                                name="rec2[]" value="{{ $item ?? '' }}">
                                            <div>
                                                <a href="#/" data-type-id="add-in" onclick="createItem(this)"
                                                    class="add-field point-7-em-font">+Ingredient</a> &nbsp;|&nbsp;
                                                <a href="#/" data-type-id="remove-in"
                                                    onclick="removeTopic(this)"
                                                    class="remove-field point-7-em-font">-Ingredient</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            @endif

                        </fieldset>

                        <fieldset>
                            <h2>Cooking instructions</h2>
                            @if (isset($json->text->li4->instructions))
                                @foreach ($json->text->li4->instructions as $items)
                                    @foreach ((array) $items as $item)
                                        <div>
                                            <input required type="text" name="in[]"
                                                value="{{ $item ?? '' }}" placeholder="(Instruction)">
                                            <div>
                                                <a href="#/" data-type-id="add-in" onclick="createItem(this)"
                                                    class="add-field point-7-em-font">+Instruction</a> &nbsp;|&nbsp;
                                                <a href="#/" data-type-id="remove-in"
                                                    onclick="removeTopic(this)"
                                                    class="remove-field point-7-em-font">-Instruction</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            @else
                                <div>
                                    <input required type="text" name="in[]" value=""
                                        placeholder="(Instruction)">
                                    <div>
                                        <a href="#/" data-type-id="add-in" onclick="createItem(this)"
                                            class="add-field point-7-em-font">+Instruction</a> &nbsp;|&nbsp;
                                        <a href="#/" data-type-id="remove-in" onclick="removeTopic(this)"
                                            class="remove-field point-7-em-font">-Instruction</a>
                                    </div>
                                </div>
                                <div>
                                    <input required type="text" name="in[]" value=""
                                        placeholder="(Instruction)">
                                    <div>
                                        <a href="#/" data-type-id="add-in" onclick="createItem(this)"
                                            class="add-field point-7-em-font">+Instruction</a> &nbsp;|&nbsp;
                                        <a href="#/" data-type-id="remove-in" onclick="removeTopic(this)"
                                            class="remove-field point-7-em-font">-Instruction</a>
                                    </div>
                                </div>
                            @endif

                        </fieldset>

                        <h2>Recipe variations</h2>
                        @if (isset($json->text->li5->h2))
                            @php $parent = 0; @endphp
                            @foreach ($json->text->li5->paragraphs as $paragraph)
                                @php
                                    $section = 'rv';
                                    $parent++;
                                @endphp
                                <div>
                                    <textarea required name="rv[]" col="45" rows="8">{{ $paragraph }}</textarea>

                                    @include('school.recipes.editor')
                                </div>
                                @include('school.recipes.inserts')
                            @endforeach
                        @else
                            @php
                                $parent = 0;
                            @endphp

                            @for ($loop = 0; $loop < 2; $loop++)
                                @php
                                    $section = 'rv';
                                    $parent++;
                                @endphp
                                <div>
                                    <textarea required name="rv[]" col="45" rows="8" placeholder="(Paragraph)"></textarea>
                                    @include('school.recipes.editor')
                                </div>
                                @include('school.recipes.inserts')
                            @endfor

                        @endif

                    </fieldset>
                    <fieldset>
                        <h2>Tips and tricks</h2>
                        @if (isset($json->text->li6->h2))
                            @php $parent = 0; @endphp
                            @foreach ($json->text->li6->paragraphs as $paragraph)
                                @php
                                    $section = 'tt';
                                    $parent++;
                                @endphp
                                <div>
                                    <textarea required name="tt[]" col="45" rows="8">{{ $paragraph }}</textarea>

                                    @include('school.recipes.editor')
                                </div>
                                @include('school.recipes.inserts')
                            @endforeach
                        @else
                            @php
                                $parent = 0;
                            @endphp

                            @for ($loop = 0; $loop < 2; $loop++)
                                @php
                                    $section = 'tt';
                                    $parent++;
                                @endphp
                                <div>
                                    <textarea required name="tt[]" col="45" rows="8" placeholder="(Paragraph)"></textarea>
                                    @include('school.recipes.editor')
                                </div>
                                @include('school.recipes.inserts')
                            @endfor

                        @endif

                    </fieldset>

                        <fieldset>
                            <h2>Serving instructions</h2>
                            @if (isset($json->text->li7->h2))
                                @php $parent = 0; @endphp
                                @foreach ($json->text->li7->paragraphs as $paragraph)
                                    @php
                                        $section = 'si';
                                        $parent++;
                                    @endphp
                                    <div>
                                        <textarea required name="si[]" col="45" rows="8">{{ $paragraph }}</textarea>
                                        @include('school.recipes.editor')
                                    </div>
                                @endforeach
                            @else
                                @php
                                    $parent = 0;
                                @endphp

                                @for ($loop = 0; $loop < 2; $loop++)
                                    @php
                                        $section = 'si';
                                        $parent++;
                                    @endphp
                                    <div>
                                        <textarea required name="si[]" col="45" rows="8" placeholder="(Paragraph)"></textarea>
                                        @include('school.recipes.editor')
                                    </div>
                                    @include('school.recipes.inserts')
                                @endfor

                            @endif

                        </fieldset>

                        <fieldset>
                            <h2>What can be eaten with this recipe</h2>
                            @if (isset($json->text->li8->h2))
                                @php $parent = 0; @endphp
                                @foreach ($json->text->li8->paragraphs as $paragraph)
                                    @php
                                        $section = 'pe';
                                        $parent++;
                                    @endphp
                                    <div>
                                        <textarea required name="pe[]" col="45" rows="8">{{ $paragraph }}</textarea>
                                        @include('school.recipes.editor')
                                        <div>
                                @endforeach
                            @else
                                @php
                                    $parent = 0;
                                @endphp

                                @for ($loop = 0; $loop < 2; $loop++)
                                    @php
                                        $section = 'pe';
                                        $parent++;
                                    @endphp
                                    <div>
                                        <textarea required name="pe[]" col="45" rows="8" placeholder="(Paragraph)"></textarea>
                                        @include('school.recipes.editor')
                                    </div>
                                    @include('school.recipes.inserts')
                                @endfor

                            @endif

                        </fieldset>
                        <fieldset>
                            <h2>Where to find dish nearby</h2>
                            @if (isset($json->text->li9->h2))
                                @php $parent = 0; @endphp
                                @foreach ($json->text->li9->paragraphs as $paragraph)
                                    @php
                                        $section = 'wh';
                                        $parent++;
                                    @endphp
                                    <div>
                                        <textarea required name="wh[]" col="45" rows="8">{{ $paragraph }}</textarea>
                                        @include('school.recipes.editor')
                                    </div>
                                @endforeach
                            @else
                                @php
                                    $parent = 0;
                                @endphp

                                @for ($loop = 0; $loop < 2; $loop++)
                                    @php
                                        $section = 'wh';
                                        $parent++;
                                    @endphp
                                    <div>
                                        <textarea required name="wh[]" col="45" rows="8" placeholder="(Paragraph)"></textarea>
                                        @include('school.recipes.editor')
                                    </div>
                                    @include('school.recipes.inserts')
                                @endfor

                            @endif

                        </fieldset>
                        <fieldset>
                            <h2>Conclusion</h2>
                            @if (isset($json->text->li10->h2))
                                @php $parent = 0; @endphp
                                @foreach ($json->text->li10->paragraphs as $paragraph)
                                    @php
                                        $section = 'c';
                                        $parent++;
                                    @endphp
                                    <div>
                                        <textarea required name="c[]" col="45" rows="8">{{ $paragraph }}</textarea>
                                        @include('school.recipes.editor')
                                    </div>
                                @endforeach
                            @else
                                @php
                                    $parent = 0;
                                @endphp

                                @for ($loop = 0; $loop < 2; $loop++)
                                    @php
                                        $section = 'c';
                                        $parent++;
                                    @endphp
                                    <div>
                                        <textarea required name="c[]" col="45" rows="8" placeholder="(Paragraph)"></textarea>
                                        @include('school.recipes.editor')
                                    </div>
                                    @include('school.recipes.inserts')
                                @endfor
                            @endif

                        </fieldset>
                        <fieldset>
                            <h2>Misc.</h2>
                            <div class="div-horizontal-rule"></div>
                            <label for="products">Select <b>ALL</b> products used in the recipe: </label>
                            <p class="one-em-font"> Selecting multiple options vary in different operating systems and
                                browsers:</p>
                            <ul class="one-em-font">
                                <li class="one-em-font">For windows: Hold down the control (ctrl) button to select
                                    multiple options</li>
                                <li class="one-em-font">For Mac: Hold down the command button to select multiple
                                    options</li>
                            </ul>
                            <select name="products[]" required multiple>

                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                                
                            </select>
                            <div class="div-horizontal-rule"></div>
                            <input required type="text" name="keywords" value="{{ $edit->keywords ?? '' }}"
                                placeholder="Keywords (Required)">
                            <input required type="text" name="img" value="{{ $json->img ?? '' }}"
                                placeholder="Image (Required)">
                            <input required type="text" name="videoID" value="{{ $json->videoID ?? '' }}"
                                placeholder="YouTube video ID (Required)">
                            <input required type="text" name="category" value="{{ $edit->category ?? '' }}"
                                placeholder="Recipe country (Required)">
                            <input required type="text" name="uri" value="{{ $edit->uri ?? '' }}"
                                placeholder="URI (Required)">
                            <textarea maxlength="255" required name="blurb" col="45" rows="8" placeholder="Blurb (Required)">{{ $edit->blurb ?? '' }}</textarea>

                        </fieldset>

                        <input class="button" type="submit" value="SAVE">

                    </form>
                @endif
            </section>
        </main>

    </div>
</body>

</html>

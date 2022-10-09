@extends('layouts.index')
@section('content')
    <main id="publish">
        <section class="section maxw600px rounded-corner card">
            <form class="font-size-1-5-em" action="{{ url('/publish/getblog') }}" method="post" class="r-float">
                @csrf
                <fieldset>
                    <select name="id">
                        <option invalid>Select Action (Required)</option>
                        <option value="">WRITE: New Blog</option>
                        @if (isset($blog))
                            @foreach ($blog as $item)
                                <option value="{{ $item->id }}">{{ 'EDIT: ' . $item->short_title }}</option>
                            @endforeach
                        @endif
                    </select>
                    <input type="submit" value="SET">
                </fieldset>

            </form>
            @if (isset($blog))
                <form class="font-size-1-5-em" action="{{ route('blog.save') }}" method="post" name="blog" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $edit->id ?? '' }}">
                    <fieldset>
                        <h2>Blog Titles</h2>

                        <input maxlength="255" type="text" name="title" value="{{ $json->title ?? '' }}"
                            placeholder="10 word title (Required)">
                        <input maxlength="250" type="text" name="short_title" value="{{ $edit->short_title ?? '' }}"
                            placeholder="3 word title (Required)">

                    </fieldset>
                    <fieldset>
                        <h2>Opening Paragraphs</h2>

                        <textarea required name="p1" col="45" rows="8" placeholder="(Required)">{{ $json->p1 ?? '(Required)' }}</textarea>
                        <textarea required name="p2" col="45" rows="8" placeholder="(Required)">{{ $json->p2 ?? '(Required)' }}</textarea>


                    </fieldset>

                    <fieldset>
                        <h2>Table of contents</h2>
                        @if (isset($json->text->tableOfContents))
                            @foreach ($json->text->tableOfContents as $items)
                                @foreach ((array) $items as $item)
                                    <input type="text" name="topics[]" value="{{ $item ?? '' }}" placeholder="(Topic)">
                                @endforeach
                            @endforeach
                        @else
                            <input type="text" name="topics[]" value="" placeholder="Topic (Required)">
                        @endif
                        <a href="#/" class="add-field">Add</a> &nbsp;|&nbsp;
                        <a href="#/"class="remove-field">Remove</a>
                    </fieldset>

                    <fieldset>
                        <h2>Health Benefits</h2>
                        @if (isset($json->text->content->paragraphs))
                            @foreach ($json->text->content->paragraphs as $paragraph)
                                <textarea required name="hb[]" col="45" rows="8" placeholder="(Required)">{{ $paragraph ?? '' }}</textarea>
                            @endforeach
                        @else
                            <textarea required name="hb[]" col="45" rows="8" placeholder="(Required)"></textarea>
                            <textarea required name="hb[]" col="45" rows="8" placeholder="(Required)"></textarea>
                        @endif
                        <a href="#/" class="add-field">Add</a> &nbsp;|&nbsp;
                        <a href="#/"class="remove-field">Remove</a>
                    </fieldset>

                    <fieldset>
                        <h2>Pregnant women</h2>
                        @if (isset($json->text->li2->paragraphs))
                            @foreach ($json->text->li2->paragraphs as $paragraph)
                                <textarea required name="preg[]" col="45" rows="8">{{ $paragraph ?? '' }}</textarea>
                            @endforeach
                        @else
                            <textarea required name="preg[]" col="45" rows="8" placeholder="(Required)"></textarea>
                            <textarea required name="preg[]" col="45" rows="8" placeholder="(Required)"></textarea>
                        @endif
                        <a href="#/" class="add-field">Add</a> &nbsp;|&nbsp;
                        <a href="#/"class="remove-field">Remove</a>
                    </fieldset>

                    <fieldset>

                        <h2>Recipe</h2>
                        <label>Short bullet points:</label>
                        @if (isset($json->text->li3->recipe->recipe1))
                            @if (isset($json->text->li3->h41))
                                <input type="text" name="rech4[]" value="{{ $json->text->li3->h41 }}">
                            @endif
                            @foreach ($json->text->li3->recipe->recipe1 as $items)
                                @foreach ((array) $items as $item)
                                    <input type="text" name="rec[]" value="{{ $item ?? '' }}" required placeholder="(Required)">
                                @endforeach
                            @endforeach
                        @else
                            <input type="text" name="rec[]" value="" required placeholder="(Required)">
                            <input type="text" name="rec[]" value="" required placeholder="(Required)">
                        @endif

                        @if (isset($json->text->li3->recipe->recipe2))
                            @if (isset($json->text->li3->h42))
                                <input type="text" name="rech4[]" value="{{ $json->text->li3->h42 }}">
                            @endif
                            @foreach ($json->text->li3->recipe->recipe2 as $items)
                                @foreach ((array) $items as $item)
                                    <input placeholder="(Required)" required type="text" name="rec2[]" value="{{ $item ?? '' }}">
                                @endforeach
                            @endforeach
                        @endif
                        <a href="#/" class="add-field">Add</a> &nbsp;|&nbsp;
                        <a href="#/"class="remove-field">Remove</a>

                    </fieldset>

                    <fieldset>
                        <h2>Cooking instructions</h2>
                        <label>Short bullet points:</label>
                        @if (isset($json->text->li4->instructions))
                            @foreach ($json->text->li4->instructions as $items)
                                @foreach ((array) $items as $item)
                                    <input required type="text" name="in[]" value="{{ $item ?? '' }}" placeholder="(Required)">
                                @endforeach
                            @endforeach
                        @else
                            <input required type="text" name="in[]" value="" placeholder="(Required)">
                            <input required type="text" name="in[]" value="" placeholder="(Required)">
                        @endif
                        <a href="#/" class="add-field">Add</a> &nbsp;|&nbsp;
                        <a href="#/"class="remove-field">Remove</a>
                    </fieldset>

                    <fieldset>
                        <h2>Recipe variations</h2>
                        @if (isset($json->text->li5->h2))
                            @foreach ($json->text->li5->paragraphs as $paragraph)
                                <textarea required name="rv[]" col="45" rows="8">{{ $paragraph }}</textarea>
                            @endforeach
                        @else
                            <textarea required name="rv[]" col="45" rows="8" placeholder="(Required)"></textarea>
                            <textarea required name="rv[]" col="45" rows="8" placeholder="(Required)"></textarea>
                        @endif
                        <a href="#/" class="add-field">Add</a> &nbsp;|&nbsp;
                        <a href="#/"class="remove-field">Remove</a>
                    </fieldset>

                    <fieldset>
                        <h2>Serving instructions</h2>
                        @if (isset($json->text->li6->h2))
                            @foreach ($json->text->li6->paragraphs as $paragraph)
                                <textarea required name="si[]" col="45" rows="8">{{ $paragraph }}</textarea>
                            @endforeach
                        @else
                            <textarea required name="si[]" col="45" rows="8" placeholder="(Required)"></textarea>
                            <textarea required name="si[]" col="45" rows="8" placeholder="(Required)"></textarea>
                        @endif
                        <a href="#/" class="add-field">Add</a> &nbsp;|&nbsp;
                        <a href="#/"class="remove-field">Remove</a>
                    </fieldset>

                    <fieldset>
                        <h2>What can be eaten with this recipe</h2>
                        @if (isset($json->text->li7->h2))
                            @foreach ($json->text->li7->paragraphs as $paragraph)
                                <textarea required name="pe[]" col="45" rows="8">{{ $paragraph }}</textarea>
                            @endforeach
                        @else
                            <textarea required name="pe[]" col="45" rows="8" placeholder="(Required)"></textarea>
                            <textarea required name="pe[]" col="45" rows="8" placeholder="(Required)"></textarea>
                        @endif
                        <a href="#/" class="add-field">Add</a> &nbsp;|&nbsp;
                        <a href="#/"class="remove-field">Remove</a>
                    </fieldset>
                    <fieldset>
                        <h2>Where to find dish nearby</h2>
                        @if (isset($json->text->li8->h2))
                            @foreach ($json->text->li8->paragraphs as $paragraph)
                                <textarea required name="wh[]" col="45" rows="8">{{ $paragraph }}</textarea>
                            @endforeach
                        @else
                            <textarea required name="wh[]" col="45" rows="8" placeholder="(Required)"></textarea>
                            <textarea required name="wh[]" col="45" rows="8" placeholder="(Required)"></textarea>
                        @endif
                        <a href="#/" class="add-field">Add</a> &nbsp;|&nbsp;
                        <a href="#/"class="remove-field">Remove</a>
                    </fieldset>
                    <fieldset>
                    <h2>Conclusion</h2>
                    @if (isset($json->text->li9->h2))
                        @foreach ($json->text->li9->paragraphs as $paragraph)
                            <textarea required name="c[]" col="45" rows="8">{{ $paragraph }}</textarea>
                        @endforeach
                    @else
                        <textarea required name="c[]" col="45" rows="8" placeholder="(Required)"></textarea>
                        <textarea required name="c[]" col="45" rows="8" placeholder="(Required)"></textarea>
                    @endif
                    <a href="#/" class="add-field">Add</a> &nbsp;|&nbsp;
                    <a href="#/"class="remove-field">Remove</a>
                    </fieldset>
                    <fieldset>
                        <h2>Misc.</h2>
                        <input required type="text" name="keywords" value="{{ $edit->keywords ?? '' }}"
                            placeholder="Keywords (Required)">
                        <input required type="text" name="img" value="{{ $json->img ?? '' }}" placeholder="Image (Required)">
                        <input required type="text" name="videoID" value="{{ $json->videoID ?? '' }}"
                            placeholder="YouTube video ID (Required)">
                        <input required type="text" name="category" value="{{ $edit->category ?? '' }}"
                            placeholder="Recipe country (Required)">
                        <input required type="text" name="uri" value="{{ $edit->uri ?? '' }}" placeholder="URI (Required)">
                        <textarea  maxlength="255" required name="blurb" col="45" rows="8" placeholder="Blurb (Required)">{{ $edit->blurb ?? '' }}</textarea>
                      
                    </fieldset>

                    <input class="button" type="submit" value="PUBLISH">

                </form>
            @endif
        </section>
    </main>
@endsection

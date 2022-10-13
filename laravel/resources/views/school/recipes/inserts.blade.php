@if (isset($json->inserts))

    @php
        $subs = $json->inserts->subs;
        $uls = $json->inserts->uls;
        $subs = $subs[0];
        $uls = $uls[0];
    @endphp

@if (isset($subs))
@for ($loop = 0; $loop < 10; $loop++)
    @if (isset($subs->$section->$loop) && $loop == $parent)
        <div>
            <input type="text" name="sub[{{ $section }}][{{ $parent }}][]"
                value="{{ $subs->$section->$parent[0] }}" placeholder="(List item)">
            <div>
                <a href="#/" onclick="removeSubheading(this)" class="remove-field point-7-em-font">-Subheading</a>
            </div>

        </div>
    @endif
@endfor
@endif


@if (isset($uls))
        @for ($loop = 0; $loop < 10; $loop++)
            @if (isset($uls->$section->$loop) && $loop == $parent)
            @for($i=0;  $i < count($uls->$section->$loop); $i++)
                <div>
                    <input type="text" name="ul[{{ $section }}][{{ $parent }}][]"
                        value="{{ $uls->$section->$parent[$i] }}" placeholder="(List item)">
                    <div>
                        <a href="#/" onclick="createListItem(this)" class="remove-field point-7-em-font">+Item</a>&nbsp;|&nbsp;
                        <a href="#/" onclick="removeItem(this)" class="remove-field point-7-em-font">-Item</a>
                    </div>

                </div>
                @endfor
            @endif
        @endfor
    @endif

@endif

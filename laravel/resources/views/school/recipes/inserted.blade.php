@if (isset($content->inserts))

    @php
        $subs = $content->inserts->subs;
        $uls = $content->inserts->uls;
        $subs = $subs[0];
        $uls = $uls[0];
    @endphp

    @if (isset($subs))

        @for ($loop = 0; $loop < 10; $loop++)
            @if (isset($subs->$section->$loop) && $loop == $parent)
                @if (isset($subs->$section->$parent[0]))
                    <h3>{{ strtolower($subs->$section->$parent[0]) }}</h3>
                @endif
            @endif
        @endfor

    @endif

    @if (isset($uls))

        @for ($loop = 0; $loop < 10; $loop++)
            @if (isset($uls->$section->$loop) && $loop == $parent)
                @if ($section == 'rec' || $section == 'in')
                    <ul>
                    @else
                        <ol>
                @endif
                @for ($i = 0; $i < count($uls->$section->$loop); $i++)
                    @if (isset($uls->$section->$parent[$i]))
                        <li>
                            @if ($section == 'rec' || $section == 'in')
                            <form><input type="checkbox" id="{{ ucfirst($uls->$section->$parent[$i]) }}" name="1"><label for="{{ ucfirst($uls->$section->$parent[$i]) }}">  {{ ucfirst($uls->$section->$parent[$i]) }}</label>
                            </form>

                                @else
                            {{ ucfirst($uls->$section->$parent[$i]) }}
                            
                            
                            @endif
                        </li>
                    @endif
                @endfor
                @if ($section == 'rec' || $section == 'in')
                        </ul>
                @else
                    </ol>
            @endif
            @endif
        @endfor

    @endif

@endif

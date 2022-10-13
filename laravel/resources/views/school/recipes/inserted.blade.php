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
                <ol>
                    @for ($i = 0; $i < count($uls->$section->$loop); $i++)
                        @if (isset($uls->$section->$parent[$i]))
                            <li>{{ ucfirst($uls->$section->$parent[$i]) }}</li>
                        @endif
                    @endfor
                </ol>
                @endif
            @endfor
        
    @endif

@endif

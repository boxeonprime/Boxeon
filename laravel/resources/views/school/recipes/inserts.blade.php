@if (isset($json->inserts))

    @php
        $uls = $json->inserts->uls;
        $subs = $json->inserts->subs;
        
    @endphp

        @if (isset($subs[0]->$section->$parent[0]))
            <div>
                <input type="text" name="sub['{{ $section }}']['{{ $parent }}'][]"
                    value="{{ $subs[0]->$section->$parent[0] }}" placeholder="(Subheading)">
                <div>
                    <a href="#/" onclick="removeSubheading(this)" class="remove-field point-7-em-font">-Subheading</a>
                </div>

            </div>
        @endif
  
        @if (isset($uls[0]->$section->$parent[0]))
            <div>
                <input type="text" name="ul['{{ $section }}']['{{ $parent }}'][]"
                    value="{{ $uls[0]->$section->$parent[0] }}" placeholder="(List item)">
                <div>
                    <a href="#/" onclick="removeSubheading(this)"
                        class="remove-field point-7-em-font">-Subheading</a>
                </div>

            </div>
        @endif

@endif

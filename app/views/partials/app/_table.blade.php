<table class="table table-bordered {{ $class }}">
    <colgroup>
        @for ($i = 0; $i < count($columns); $i++)
        <col class="con{{ $i }}" />
        @endfor
    </colgroup>
    <thead>
    <tr>
        @foreach($columns as $i => $c)
        <th align="center" valign="middle" class="head{{ $i }}">{{ $c }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($data as $d)
    <tr>
        @foreach($d as $dd)
        <td>{{ $dd }}</td>
        @endforeach
    </tr>
    @endforeach
    </tbody>
</table>

@if (isset($values['link-to-record']))
    <script type="text/javascript">
        $( document ).ready(function() {
            $('.{{$class}}').hover(function() {
                $(this).css('cursor', 'pointer');
            });
            $('.{{$class}}').on('click', 'tbody tr', function(e) {
                $id = e.currentTarget.children[0].innerHTML;
                $url = e.currentTarget.baseURI;
                document.location.href = "{{ $values['link-to-record'] }}/" + $id + "/edit";
            });
        });
    </script>
@endif
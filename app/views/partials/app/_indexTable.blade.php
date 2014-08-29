<table
class="table table-responsive clearfix data-table {{ $class }}  "

@if($options['sAjaxSource'])
data-ajaxsource="{{ $options['sAjaxSource'] }}"
@endif

@foreach($values as $property => $value)
    data-{{ $property }}="{{ $value }}"
@endforeach

>

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
            <td>
                {{ $dd }}
            </td>
        @endforeach
    </tr>
    @endforeach
    </tbody>
</table>

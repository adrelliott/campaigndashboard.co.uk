@extends('layouts.index')

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> All Your Broadcasts
    </h1>
    <p class="lead">
        Make some noise!
    </p>
@stop



@section('actions-list')
    <li><a href="{{ route('app.broadcasts.create') }}"><p><em>Create new Broadcast</em></p></a></li>
@stop


@section('content')
<div class="table-responsive clearfix">
    <table class="table table-striped table-bordered table-hover dataTable" data-config="dataTableConfig">
        <thead>
        <tr>
            <th></th>
            <th>broadcast_title</th>
        </tr>
        </thead>

        <tbody></tbody>
    </table>
</div>

<div class="row">
    <a href="/app/broadcasts/create" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New
        {{ $config['broadcasts']['label'] }}</a>
</div>
@stop

@section('end_of_page')
    <script type="text/javascript">
        config = function()
        {
            return {
                searching: true,
                columns: [
                    { name: 'id', data: 'id' },
                    { name: 'broadcast_title', data: 'broadcast_title' },


                ],
                serverSide: true,
                ajax: {
                    // method: 'post',
                    url: '<?= URL::route("app.broadcasts.index") ?>'
                }
            };
        };

        window.dataTableConfig['dataTableConfig'] = config;
    </script>
@stop


@extends('layouts.index') 

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> All Your {{ $config['contacts']['label'] }}s
    </h1>
    <p class="lead">
        Just look at them - sitting there all shiny and proud... (And the best bit? They're all yours!)
    </p>
@stop

@section('actions-list')
    <li><a href="{{ route('app.contacts.create') }}"><p><em>Create new {{ $config['contacts']['label'] }}</em></p></a></li>
@stop

@section('content')
    <div class="table-responsive clearfix">
        <table class="table table-striped table-bordered table-hover dataTable" data-config="dataTableConfig">
            <thead>
                <tr>
                    <th></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Landline</th>
                    <th>Mobile</th>
                </tr>
            </thead>

            <tbody></tbody>
        </table>
    </div>

    <div class="row">
        <a href="/app/contacts/create" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New {{ $config['contacts']['label'] }}</a>
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
                    { name: 'first_name', data: 'first_name' },
                    { name: 'last_name', data: 'last_name', defaultContent: '' },
                    { name: 'email', data: 'email', defaultContent: '' },
                    { name: 'phone', data: 'landline', defaultContent: '', orderable: false },
                    { name: 'mobile_phone', data: 'mobile', defaultContent: '', orderable: false }
                ],
                serverSide: true,
                ajax: {
                    // method: 'post',
                    url: '<?= URL::route("app.contacts.index") ?>'
                }
            };
        };

        window.dataTableConfig['dataTableConfig'] = config;
    </script>
@stop
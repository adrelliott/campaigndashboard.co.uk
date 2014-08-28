@extends('layouts.index') 

@section('page-title')
    <h1>
        <i class="fa fa-search"></i> Search Results
    </h1>
    <p class="lead">
        Because who wants to dig around data tables?
    </p>
@stop

@section('content')
    <div class="table-responsive clearfix">
        <table class="table table-bordered table-striped dataTable display" data-config="dataTableConfig">
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
@stop

@section('end_of_page')
    <script type="text/javascript">
        config = function()
        {
            return {
                columns: [
                    { name: 'id', data: 'id' },
                    { name: 'first_name', data: 'first_name' },
                    { name: 'last_name', data: 'last_name', defaultContent: '' },
                    { name: 'email', data: 'email', defaultContent: '' },
                    { name: 'landline', data: 'landline', defaultContent: '', orderable: false },
                    { name: 'mobile', data: 'mobile', defaultContent: '', orderable: false }
                ],
                serverSide: true,
                ajax: {
                    method: 'post',
                    data: { q: <?= json_encode($query) ?> },
                    url: '<?= URL::route("app.search.process") ?>'
                }
            };
        };

        if (typeof window.dataTableConfig != "object")
            window.dataTableConfig = {}

        window.dataTableConfig['dataTableConfig'] = config;
    </script>
@stop
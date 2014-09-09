@extends('layouts.dashboard')

@section('jumbotron')
    <h1>Hello {{ $current_user->first_name }}!</h1>
    <p>Use the menus on the top to find your way around.</p>
    <div class="row">
        <p><a href="contacts/create" class="btn btn-primary btn-lg pull-right" role="button"><i class="fa fa-plus"></i>  Create new {{ $config['contacts']['label'] }}</a></p>
    </div>
@stop

@section('well')
    <ul class="list-group">
        <li class="list-group-item">
            <span class="badge">6494</span>
            Total Number of Contacts
        </li>
        <li class="list-group-item">
            <span class="badge">4989</span>
            Total Number of Adult Contacts
        </li>
        <li class="list-group-item">
            <span class="badge">1492</span>
            Total Number of Junior Contacts
        </li>
        <li class="list-group-item">
            <span class="badge">2684</span>
            Number of Adult members
        </li>
        <li class="list-group-item">
            <span class="badge">440</span>
            Number of Junior members
        </li>
        <li class="list-group-item">
            <span class="badge">936</span>
            Number of Adult Season Tickets
        </li>
        <li class="list-group-item">
            <span class="badge">169</span>
            Number of Junior Season Tickets
        </li>
    </ul>
@stop

@section('contacts')
    <h1>
        <i class="fa fa-user"></i> Your {{ $config['contacts']['label'] }}s
    </h1>

    <div class="table-responsive clearfix">
        <table class="table table-striped table-bordered table-hover dataTable" data-config="dtContactsConfig">
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

@section('orders')
    <h1>
        <i class="fa fa-user"></i> Your {{ $config['orders']['label'] }}s
    </h1>

    <div class="table-responsive clearfix">
        <table class="table table-striped table-bordered table-hover dataTable" data-config="dtOrdersConfig">
            <thead>
            <tr>
                <th></th>
                <th>First Name</th>
            </tr>
            </thead>

            <tbody></tbody>
        </table>
    </div>

    <div class="row">
        <a href="/app/contacts/create" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New {{ $config['orders']['label'] }}</a>
    </div>
@stop


@section('end_of_page')
<script type="text/javascript">
    contactsConfig = function()
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
     ordersConfig = function()
        {
            return {
                searching: true,
                columns: [
                    { name: 'id', data: 'id' },
                    { name: 'first_name', data: 'first_name' }
                ],
                serverSide: true,
                ajax: {
                    // method: 'post',
                    url: '<?= URL::route("app.contacts.index") ?>'
                }
            };
        };

    window.dataTableConfig['dtContactsConfig'] = contactsConfig;
    window.dataTableConfig['dtOrdersConfig'] = ordersConfig;
</script>
@stop
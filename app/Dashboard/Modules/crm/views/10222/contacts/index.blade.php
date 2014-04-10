@extends('crm::defaults.contacts.index')

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> All Your {{ $config['contacts']['label'] }}s
    </h1>
    <p class="lead">
        Search by any of the columns you see here.
    </p>
@stop

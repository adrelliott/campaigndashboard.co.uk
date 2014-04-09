@extends('crm::defaults.contacts.index')

<?php
    // set up the index table
    // $dataTables['index'] = Datatable::table()       // these are the column headings to be shown  
    //     ->setUrl(URL::to('api/contacts?datatable=true&cols=id,first_name,last_name,owner_id'))
    //     ->addColumn(array('Id', 'First Name', 'Last name'))
    //     ->setOptions(
    //         array(
    //             'sPaginationType' => 'bootstrap',
    //             'iDisplayLength' => 5,
    //             'bLengthChange' => false,
    //             )
    //         )
    //     ->noScript()
?>

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> All Your {{ $config['contacts']['label'] }}s
    </h1>
    <p class="lead">
        Search by any of the columns you see here.
    </p>
@stop

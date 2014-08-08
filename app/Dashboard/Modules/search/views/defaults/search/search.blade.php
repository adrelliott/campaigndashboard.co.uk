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
        <table class="table table-bordered table-striped dataTable display">
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

            <tbody>
                
                <?php foreach($results as $row): ?>
                    <tr>
                        <td><?= $row->id ?></td>
                        <td><?= $row->first_name ?></td>
                        <td><?= $row->last_name ?></td>
                        <td><?= $row->email ?></td>
                        <td><?= $row->landline() ?></td>
                        <td><?= $row->mobile_phone ?></td>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>
@stop

@section('end_of_page')
    {{ HTML::script('assets/js/datatables/jquery.dataTables-1.10.2.min.js') }}
    {{ HTML::script('assets/js/app/tables.js') }}
    
    {{ HTML::style('//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.css') }}
    {{ HTML::script('//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js') }}
@stop
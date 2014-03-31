@extends('crm::defaults.contacts.index')

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> All Your {{ $config['contacts']['label'] }}s
    </h1>
    <p class="lead">
        Search by any of the columns you see here.
    </p>
@stop

@section('table')
        
    <div class="table-responsive clearfix"> 
        <table class="table dataTable data-table" id="contacts_table" 
        data-ajaxsource="/dt/contacts?cols=id,first_name,last_name,nickname,postcode,email,mobile_phone,legacy_id&datatables=true"
        data-showid="false" data-linkurl="/app/contacts" data-iDisplayLength="5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Known As</th>
                    <th>Postcode</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Memb No</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

@stop
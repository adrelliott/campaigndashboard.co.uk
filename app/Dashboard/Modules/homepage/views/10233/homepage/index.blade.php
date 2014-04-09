@extends('homepage::defaults.homepage.index')

@section('well')

    <ul class="list-group">
        <li class="list-group-item">
            <span class="badge">494</span>
            Total Number of Contacts
        </li>
        <li class="list-group-item">
            <span class="badge">494</span>
            Total Number Opted-into Newsletter
        </li>
        <li class="list-group-item">
            <span class="badge">49</span>
            Total Number of Emails Sent
        </li>
        <li class="list-group-item">
            <span class="badge">142</span>
            <span class="label label-info">Suspect</span>
            Total Number of Suspects
        </li>
        <li class="list-group-item">
            <span class="badge">65</span>
            <span class="label label-primary">Prospects</span>
            Total Number of Prospects
        </li>
        <li class="list-group-item">
            <span class="badge">34</span>
            <span class="label label-success">Clients</span>
            Total Number of Clients
        </li>
    </ul>

@stop

@section('contacts-table')
    <div class="table-responsive clearfix">
        <table class="table dataTable data-table" id="contacts_table" data-ajaxsource="/api/contacts?cols=id,first_name,last_name,postcode,email,mobile_phone&datatable=true" data-showid="false" data-linkurl="contacts" data-iDisplayLength="5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Postcode</th>
                    <th>Email</th>
                    <th>Mobile</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

@stop
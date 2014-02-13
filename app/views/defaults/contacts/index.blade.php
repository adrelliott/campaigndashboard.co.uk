@extends('defaults.layouts.index')

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> All Your People
    </h1>
    <p class="lead">
        Just look at the - sitting there all shiny and proud... (And the best bit? They're all yours!)
    </p>
@stop

@section('actions-list')
    <li><a href="{{ route('contacts.create') }}"><p><em>Create new contact</em></p></a></li>
@stop

@section('table')
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->first_name }}</td>
                    <td>{{ $contact->last_name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>
                        <a href="{{ route('contacts.edit', ['contacts' => $contact->id]) }}">Edit</a>
                        | <a href="{{ route('contacts.create', ['contact' => $contact->id]) }}">New record</a>
                    </td>
                </tr>    
            @endforeach
            
            
        </tbody>
    </table>

@stop

@section('below-table')
    <div>
        <a href="contacts/create" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New contact</a>
    </div>
@stop
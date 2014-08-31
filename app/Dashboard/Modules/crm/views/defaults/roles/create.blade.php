@extends('layouts.modal')

@section('modal-body')
    <h4 class="text-primary1"><i class="fa fa-pencil"></i> Add a new role here</h4>
            
    @ownerInclude('crm::roles._form')
@stop
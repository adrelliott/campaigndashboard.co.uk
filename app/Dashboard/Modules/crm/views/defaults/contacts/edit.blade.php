@extends('layouts.show')

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> {{ $model->fullName }}
    </h1>
    <p class="lead">
        You met each other <em>roughly</em> {{ $model->created_at }}.
    </p>
    
@stop 

@section('actions-list')
    <li><a href="{{ route('app.contacts.create') }}"><p><em>Create new {{ $config['contacts']['label'] }}</em></p></a></li>
@stop

@section('overview1')

    // Change my section name to 'overview' (and the one below to overview1) to use Former

    {{ Former::open()
            ->role('Form')
            ->class('')
            ->method('POST')
            ->route('app.contacts.store')
            ->populate($model);
            
            }}
        <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::email('email')->class('form-control input-lg')->placeholder('E.g. lionel@GiveUsAClue.com') }}
        </div>
    
    {{ Former::close() }}
@stop

@section('overview')
    <h3 class="text-primary"><i class="fa fa-info-circle"></i> Overview</h3>
   
    {{ Form::model(
        $model,
        array(
            'route' => array('app.contacts.update', $model->id),
            'method' => 'PATCH',
            'role' => 'form',
            'class' => 'ajax-form',
            'ajax-url' => '/api/contacts/' . $model->id,
            'ajax-method' => 'PATCH',
        ))
    }}

        @foreach ($config['forms']['contacts']['edit_overview'] as $field => $attr)
            {{ Form::inputBS($field, $attr) }}
        @endforeach
    
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
        </div>

@stop
{{ dump($model->resource)}}
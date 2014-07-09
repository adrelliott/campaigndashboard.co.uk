@extends('layouts.create')

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> Create a new {{ $config['contacts']['label'] }}
    </h1>
    <p class="lead">
        Add the basic details (more options on the next page).
    </p>
@stop

@section('col1')
    <div class="well"><!-- Well -->
        <h4 class="text-primary1"><i class="fa fa-pencil"></i> What's your new {{ $config['contacts']['label'] }}'s name...?</h4>

            @section('create-form')
                <h1>here si the default form</h1>
            @show


            {{ Form::open( array(
                'route' => array('app.contacts.store'),
                'role' => 'form',
                ) )
            }}

                @foreach ($config['forms']['contacts']['create'] as $field => $attr)
                    {{ Form::inputBS($field, $attr) }}
                @endforeach

                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Create this {{ $config['contacts']['label'] }}</button>
                </div>   

            {{ Form::close() }}
            
            <div class="form-group ">
                <p class="help-block"><strong>Got more to say?</strong> Don't worry, there's space on the next page for all that</p>
            </div>
     
    </div><!-- /Well -->
@stop




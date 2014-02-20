@extends('layouts.create')

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> Create a User
    </h1>
    <p class="lead">
        You can have unlimited users!
    </p>
@stop

@section('col1')
    <div class="well"><!-- Well -->
        <h4 class="text-primary1"><i class="fa fa-pencil"></i> What's your new user's name...?</h4>
        
            {{ Former::open()
            ->role('Form')
            ->class('')
            ->id('')
            ->method('POST')
            ->route('app.users.store');
            // ->populate($record->resource);
            
            }}

                <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                    {{ Former::text('first_name')->class('form-control input-lg')->placeholder('E.g. Lionel') }}
                </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                    {{ Former::text('last_name')->class('form-control input-lg')->placeholder('E.g. Blair') }}
                </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                    {{ Former::text('email')->class('form-control input-lg')->placeholder('E.g. li_the_guy@gmail.com') }}
                </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                    {{ Former::text('password')->class('form-control input-lg')->placeholder('Choose one that\'s tough to guess')->label('User\'s password') }}
                </div>

               <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                    {{ Former::text('_password_confirmation')->class('form-control input-lg')->placeholder('Type your new password again')->label('Password Confirmation') }}
                </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                    {{ Former::tel('mobile_phone')->class('form-control input-lg')->placeholder('E.g. 07703545343') }}
                </div>

<ul>
    To do:
    <li>add mobile_phone to db</li>
    <li>validation of required firstname, password, val password=password cnfirmaiton, also add </li>
</ul>


                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Create this Fan</button>
                </div>   

            {{ Former::close() }}
            
            <div class="form-group ">
                <p class="help-block"><strong>Got more to say?</strong> Don't worry, there's space on the next page for all that</p>
            </div>
     
    </div><!-- /Well -->
@stop


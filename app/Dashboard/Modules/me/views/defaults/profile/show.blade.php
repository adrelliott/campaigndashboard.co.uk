@extends('me::layouts.client')

@section('content')
<div class="row" >
    <div class="col-md-12">
        @include('partials.common._message')
    </div>

    <div class="col-md-6">
        <h1>My Information</h1>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

        {{ Former::open_vertical()
            ->route('me.contact', $model->hash)
            ->method('PATCH')
            ->populate($contact->resource) }}
                    
                    <fieldset>
                        {{ Former::input('first_name') }}
                        {{ Former::input('last_name') }}
                        {{ Former::input('nickname') }}
                        {{ Former::input('company') }}
                    </fieldset>

                    <fieldset>
                        {{ Former::input('email') }}
                    </fieldset>

                    <fieldset>
                        <legend>Telephone</legend>

                        {{ Former::input('mobile_phone') }}
                        {{ Former::input('home_phone') }}
                        {{ Former::input('work_phone') }}
                        {{ Former::input('overseas_phone') }}
                    </fieldset>

                    <fieldset>
                        <legend>Address</legend>

                        {{ Former::input('address1') }}
                        {{ Former::input('address2') }}
                        {{ Former::input('address3') }}
                        {{ Former::input('city') }}
                        {{ Former::input('county') }}
                        {{ Former::input('postcode') }}
                        {{ Former::input('country') }}
                    </fieldset>

                    <fieldset>
                        <legend>Social Media</legend>

                        {{ Former::input('twitter_id')->label('Twitter Username') }}
                    </fieldset>

                    {{ Former::large_primary_submit('Save') }}

                    <br />
                    <br />
                    <br />
                    <br />
                    <br />

        {{ Former::close() }}
    </div>

    <div class="col-md-4">
        <h2>Subscriptions</h2>

        {{ Former::open_vertical()
            ->route('me.contact', $model->hash)
            ->method('PATCH')
            ->populate($contact->resource) }}
                    {{ Former::hidden('optin_email')->forceValue('0') }}
                    {{ Former::hidden('optin_sms')->forceValue('0') }}
                    {{ Former::hidden('optin_post')->forceValue('0') }}

                    {{ Former::checkbox('optin_email') }}
                    {{ Former::checkbox('optin_sms') }}
                    {{ Former::checkbox('optin_post') }}

                    {{ Former::large_primary_submit('Save') }}

        {{ Former::close() }}
    </div>    

    <div class="col-md-4">
        <h2>Update Password</h2>

        {{ Former::open()
            ->route('me', $model->hash)
            ->method('PATCH')
            ->populate($model) }}
                    
                    {{ Former::password('password')->label(FALSE)->placeholder('Password') }}
                    {{ Former::password('password_confirmation')->label(FALSE)->placeholder('Confirm Password') }}

                    {{ Former::large_primary_submit('Save') }}

        {{ Former::close() }}
    </div>
</div>
@stop
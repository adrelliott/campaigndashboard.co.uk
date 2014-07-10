@extends('me::layouts.client')

@section('content')
<div class="row" >
    <div class="col-md-6">
        <h1>My Information</h1>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

        {{ Former::open_vertical()
            ->route('me.contact')
            ->method('PATCH')
            ->populate($model) }}
                    
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

                        {{ Former::input('twitter_id') }}
                    </fieldset>

                    {{ Former::large_primary_submit('Save') }}

        {{ Former::close() }}
    </div>

    <div class="col-md-4">
        <h2>Update Password</h2>

        {{ Former::open()
            ->route('me')
            ->method('PATCH')
            ->populate($model) }}
                    
                    {{ Former::password('password')->label(FALSE)->placeholder('Password') }}
                    {{ Former::password('password_confirmation')->label(FALSE)->placeholder('Confirm Password') }}

                    {{ Former::large_primary_submit('Save') }}

        {{ Former::close() }}
    </div>
</div>
@stop
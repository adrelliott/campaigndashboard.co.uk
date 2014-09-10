@extends('layouts.show')

@section('page-title')
    <h1>
        <i class="fa fa-user"></i> {{ $model->fullName . $model->membershipNumber }}
    </h1>
    <p class="lead">
        You met each other <em>roughly</em> {{ $model->created_at }}.
    </p>
    
@stop 

@section('actions-list')
    <li><a href="{{ route('app.contacts.create') }}"><p><em>Create new {{ $config['contacts']['label'] }}</em></p></a></li>
@stop

@section('overview')
    <h3 class="text-primary"><i class="fa fa-info-circle"></i> Overview</h3>

    {{ Former::open()
            ->role('Form')
            ->class('ajax-form')
            ->method('PUT')
            ->ajaxUrl('/api/contacts/' . $model->id)
            ->ajaxMethod('PUT')
            ->rules(array('name' => 'required|max:20|alpha'))
            ->action('app/contacts/' . $model->id)
            ->populate($model->resource)
    }}

        <div class="col-lg-4 col-md-4 col-sm-4  col-xs-12">
            {{ Former::select('title')->class('input-lg')->options($config['dropdowns']['titles']) }}
        </div>

        <div class="col-lg-8 col-md-8 col-sm-8  col-xs-12">
            {{ Former::text('first_name')->class('form-control input-lg')->placeholder('E.g. Lionel')->id
            ('copy-source') }}
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('last_name')->class('form-control input-lg')->placeholder('E.g. Blair')->label('Last Name')
            }}
        </div>

       <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('nickname')->class('form-control input-lg copy-destination')->placeholder('E.g. Dancing Li')->label('Known As') }}
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6  col-xs-12">
            {{ Former::tel('mobile_phone')->class('form-control input-lg')->placeholder('E.g. 07703545343')->label
            ('Mobile')
            }}
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6  col-xs-12">
            {{ Former::tel('home_phone')->class('form-control input-lg')->placeholder('E.g. 01614536464')->label
            ('Landline') }}
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::email('email')->class('form-control input-lg')->placeholder('E.g. lionel@GiveUsAClue.com')
            ->label('email')
            }}
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Save
                Changes</button>
        </div>   

    {{-- We close the form in the last section --}}
        
@stop


@section('inDepth')
    <h3 class="text-primary"><i class="fa fa-folder-open"></i> In-Depth</h3>

    {{-- The form has been started in the first section & closed in the last section --}}

    <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
        {{ Former::text('company')->class('form-control input')->placeholder('E.g. Blair\'s Eclairs')->label
        ('Organisation Name') }}
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
        {{ Former::text('address1')->class('form-control input')->placeholder('E.g. 164, Givusa Street')->label('Address Line 1') }}
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
        {{ Former::text('address2')->class('form-control input')->placeholder('E.g. Clueville')->label('Address Line 2') }}
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
        {{ Former::text('address3')->class('form-control input')->placeholder('E.g. Horton Vasey')->label('Address Line 3') }}
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6  col-xs-12">
        {{ Former::text('city')->class('form-control input')->placeholder('E.g. Showtown')->label('City') }}
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6  col-xs-12">
        {{ Former::text('postcode')->class('form-control input')->placeholder('E.g. L10 4EL')->label('Postcode') }}
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6  col-xs-12">
        {{ Former::text('county')->class('form-control input')->placeholder('E.g. Hollwood')->label('County') }}
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6  col-xs-12">
        {{ Former::text('country')->class('form-control input')->placeholder('E.g. UK')->label('Country') }}
    </div>

    <div class="divider"></div>

    <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
        {{ Former::text('email2')->class('form-control input')->placeholder('E.g. liblair@hotmail.com')->label
        ('Secondary Email, Gender & DOB') }}
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6  col-xs-12">
        {{ Former::select('gender')->class('form-control input')->options($config['dropdowns']['genders']) }}
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6  col-xs-12">
        {{ Former::date('date_of_birth')->class('form-control input')}}
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
    </div>

@stop

@section('optIn')
    <h3 class="text-primary"><i class="fa fa-lock"></i> Opt Ins</h3>

    {{-- The form has been started in the first section --}}

        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12 form-inline">
            <h4 class="radio-label hidden-md hidden-lg">Receive Emails? </h4>
            {{ Former::radios('optin_email')
            ->radios(array(
            ' <i class="fa fa-thumbs-o-up "></i> Yes  ' => array('name' => 'optin_email', 'value' => '1'),
            ' <i class="fa fa-thumbs-o-down "></i> No  ' => array('name' => 'optin_email', 'value' => '0')
            ))->label('<h4 class="radio-label visible-md visible-lg">Receive Emails?</h4>') }}
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
        </div>
        
    {{ Form::close() }}
@stop

@section('notes')
    @ ownerInclude('crm::contacts.tabs.notes')
@stop

@section('purchases')
    @ownerInclude('crm::contacts.tabs.purchases')
@stop

@section('roles')
    @ownerInclude('crm::contacts.tabs.roles')
@stop

@section('tags')
    @ownerInclude('crm::contacts.tabs.tags')
@stop

@section('modal')
    @include('partials.common._modal', array('modalTitle' => $model->fullName))
{{-- dump($model) --}}
@stop

@section('end_of_page')
<script type="text/javascript">
$(function()
{
    var prices = <?= json_encode($productPrices) ?>;

    $(document).on('change', '#modal select[name^="_order_product[product_id]"]', function()
    {
        $(this).parents('tr').find('input[id^="_order_product[price]"]').val(prices[$(this).val()]);
    });
});
</script>
@append
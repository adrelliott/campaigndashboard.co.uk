@extends('crm::defaults.contacts.edit')

@section('overview1')
    <h1>This is the form in 10222</h1>
    {{ Former::horizontal_open()
          ->id('MyForm')
          ->secure()
          ->rules(['name' => 'required'])
          ->method('GET')
          ->populate($model->resource)
    }}
    {{ Former::text('first_name')}}
    {{ Former::actions()
        ->large_primary_submit('Submit')
        ->large_inverse_reset('Reset')
    }}
    {{ Former::close() }}
@stop



{{ Former::open()
    ->role('Form')
    ->class('modal-ajax-form')
    ->tableId('roles')
    ->method('POST')
    ->ajaxMethod( isset($edit) ? 'PATCH' : 'POST' )
    ->action( isset($edit) ? URL::route('app.contacts.roles.update', [ 'contacts' => $contact->id, 'roles' => $role->id ]) : URL::route('app.contacts.roles.store', $contact->id) )
    ->populate( isset($edit) ? $contact : array() ); }}

    <?= isset($edit) ? Form::hidden('_method', 'patch') : '' ?>
    <?= isset($edit) ? Form::hidden('old_role_id', $role->id) : '' ?>

    @section('content-form')
        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::select('role_id')->class('form-control input-lg')->options($roles)->value(isset($edit) ? $role->id : NULL) }}
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::text('season')->class('form-control input-lg')->placeholder('e.g. 2014/15')->value(isset($edit) ? $role->pivot->season : NULL) }}
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            {{ Former::date('start')->class('form-control input-lg')->value(isset($edit) ? date('Y-m-d', strtotime($role->pivot->start)) : NULL) }}
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            {{ Former::date('end')->class('form-control input-lg')->value(isset($edit) ? date('Y-m-d', strtotime($role->pivot->end)) : NULL) }}
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            {{ Former::textarea('notes')->class('form-control input-lg')->placeholder('Any extra notes')->rows(8)->value(isset($edit) ? $role->pivot->notes : NULL) }}
        </div>
    @show
    
    <input type="hidden" class="" name="contact_id" value="{{ $contact->id }}">

    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Save</button>
    </div>   

{{ Former::close() }}
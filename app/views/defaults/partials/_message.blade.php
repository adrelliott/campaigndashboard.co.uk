
@if (Session::get('message') == '[SAVE_SUCCESS]')
<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Woo Hoo!:</strong> That's been saved for you.
</div>

@elseif (Session::get('message') == '[SAVE_ERROR]')
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Uh oh....</strong> I had a problem saving that. Please try again.
</div>

@elseif (Session::get('message') == '[SAVE_VAL_FAIL]')
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4>Uh oh! Something's wrong!</h4>
    <ul>
        @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>

@elseif (Session::get('message') == '[XXXX]')
<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Woo Hoo!:</strong> That's been saved for you.
</div>

@elseif (Session::get('message') == '[XX]')
<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Woo Hoo!:</strong> That's been saved for you.
</div>

@elseif (strpos(Session::get('message'), 'CUSTOM'))
<div class="alert alert-{{ Session::get('messageclass') }} alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>{{ Session::get('messagetext') }}</strong>
</div>

@endif
{{ Session::forget('error') }}
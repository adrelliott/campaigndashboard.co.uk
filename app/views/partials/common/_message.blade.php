@if ($message = Session::get('success'))
<div id="alert-success" class="alert fade-out alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <span class="message-content"><strong>Woo Hoo!</strong> {{ $message }}</span>
</div>
{{ Session::forget('success') }}
@endif

@if ($message = Session::get('error'))
<div id="alert-error" class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <span class="message-content"><strong>Uh Oh...</strong> {{ $message }}</span>
</div>
{{ Session::forget('error') }}
@endif

@if ($message = Session::get('warning'))
<div id="alert-warning" class="alert alert-warning alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <span class="message-content"><strong>Erm...</strong> {{ $message }}</span>
</div>
{{ Session::forget('warning') }}
@endif

@if ($message = Session::get('info'))
<div id="alert-info" class="alert fade-out alert-info alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <span class="message-content"><strong>Just so you know...</strong> {{ $message }}</span>
</div>
{{ Session::forget('info') }}
@endif
<h2>Password Reset</h2>
<p>To reset your password, complete this form: {{ URL::route(($type == 'contactLogin' ? 'me' : 'app') . '.reset.form', array($token)) }}.</p>
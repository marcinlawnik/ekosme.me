Enter code:

{{ Form::open(array('url' => '/r', 'method' => 'get')) }}

{{ Form::text('code') }}

{{ Form::submit('Pokaż!') }}

{{ Form::close() }}
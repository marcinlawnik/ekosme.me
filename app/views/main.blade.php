Enter code:

{{ Form::open(array('url' => '/r', 'method' => 'get')) }}

{{ Form::text('code') }}

<span class="glyphicon glyphicon-play">{{ Form::submit('Pokaż!') }}</span>

{{ Form::close() }}

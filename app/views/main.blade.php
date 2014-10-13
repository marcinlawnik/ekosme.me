<html>
<body>

{{ Form::open(array('url' => '/r', 'method' => 'get')) }}

{{ Form::text('code') }}

<button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-play">{{ Form::submit('') }}</span></button>

{{ Form::close() }}
</body>

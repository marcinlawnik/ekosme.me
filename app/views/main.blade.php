<html>
<body>

{{ Form::open(array('url' => '/r', 'method' => 'get')) }}

{{ Form::text('code') }}

<button type="button" class="btn btn-default btn-sm">{{ Form::submit('<span class="glyphicon glyphicon-play"></span>') }}</button>

{{ Form::close() }}
</body>

<html>
<body>

{{ Form::open(array('url' => '/r', 'method' => 'get')) }}

{{ Form::text('code') }}

{{ Form::submit('<span class="glyphicon glyphicon-play"></span>') }}

{{ Form::close() }}
</body>

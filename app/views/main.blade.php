<html>
<body>

{{ Form::open(array('url' => '/r', 'method' => 'get')) }}

{{ Form::text('code') }}

{{ Form::button('<i class="glyphicon glyphicon-play"></i>', array('class' => '')) }}

{{ Form::close() }}
</body>

<html>
<body>

{{ Form::open(array('url' => '/r', 'method' => 'get')) }}

{{ Form::text('code') }}

{{ Form::submit('Pokaż! <span class="glyphicon glyphicon-search"></span>') }}

{{ Form::close() }}
</body>

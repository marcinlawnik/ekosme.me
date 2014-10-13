<html>
<body>

{{ Form::open(array('url' => '/r', 'method' => 'get')) }}

{{ Form::text('code') }}

{{ Form::submit(<button type="button" class="btn btn-default btn-sm">
  <span class="glyphicon glyphicon-play"></span> Star
</button>) }}

{{ Form::close() }}
</body>

<html>
<head>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>

{{ Form::open(array('url' => '/r', 'method' => 'get')) }}

{{ Form::text('code') }}

{{ Form::button('<i class="glyphicon glyphicon-play"></i>', array('class' => '')) }}

{{ Form::close() }}
</body>

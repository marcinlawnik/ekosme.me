<html>
<head>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>






<div class="container">
{{ Form::open(array('url' => '/r', 'method' => 'get')) }}
	<div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container"> 
                <div class="input-group stylish-input-group">
                    {{ Form::text('code', '', ['class'=>'form-control']) }}
                    <span class="input-group-addon">
                        {{Form::button('<span class="glyphicon glyphicon-play"></span>', array('type' => 'submit', 'class' => ''))}}
                    </span>
                </div>
            </div>
        </div>
	</div>
{{ Form::close() }}
</div>

</body>
</html>

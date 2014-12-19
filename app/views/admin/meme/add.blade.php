@extends('admin.main')

@section('content')

Add MEME:

{{ Form::open(array('url' => '/a/meme/add', 'files' => true)) }}

@endsection
{{ Form::file('meme') }}
<div class="container">
<div class="row">
<div class="row">
<div class="col-lg-6">
<div class="input-group">
<span class="input-group-addon">Tytuł</span>
{{ Form::text('title' , '' , array('id' => 'inputsm' , 'class' => 'form-control')) }}
</div>
</div>
</div>
</div>
</div>
<div class="container">
<div class="row">
<div class="row">
<div class="col-lg-6">
<div class="input-group">
<span class="input-group-addon">Opis </span>
{{ Form::text('description' , '' , array( 'id' => 'inputsm' , 'class' => 'form-control')) }}
</div>
</div>
</div>
</div>
</div>
{{ Form::submit('Dodaj!' , array( 'class' => 'btn btn-success')) }}
{{ Form::close() }}
@endsection

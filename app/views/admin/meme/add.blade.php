@extends('admin.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            Add MEME:

            {{ Form::open(array('url' => '/a/meme/add', 'files' => true)) }}

            {{ Form::file('meme') }}
            <div class="input-group">
                <span class="input-group-addon">Tytuł</span>
                {{ Form::text('title' , '' , array('id' => 'inputsm' , 'class' => 'form-control')) }}
            </div>
            <div class="input-group">
                <span class="input-group-addon">Opis </span>
                {{ Form::text('description' , '' , array( 'id' => 'inputsm' , 'class' => 'form-control')) }}
            </div>
            {{ Form::submit('Dodaj!' , array( 'class' => 'btn btn-success')) }}
            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection

@extends('admin.main')

@section('content')

Add MEME:

{{ Form::open(array('url' => '/a/meme/add', 'files' => true)) }}
Plik:
{{ Form::file('meme') }}
<br>
Tytuł:
{{ Form::text('title') }}
<br>
Opis:
{{ Form::text('description') }}

<br>
{{ Form::submit('Dodaj!') }}

{{ Form::close() }}

<div class="container">
    <div class="row">
        <div class="row">          
            <div class="col-lg-6">
                <div class="input-group">
                    <span class="input-group-addon">Tytuł</span>
                    {{ Form::text('title') }}
                </div>
            </div>
        </div>
        
    </div>
</div>

    <div class="row">
        <div class="row">          
            <div class="col-lg-6">
                <div class="input-group">
                    <span class="input-group-addon">Opis</span>
                    {{ Form::text('description') }}
                </div>
            </div>
        </div>
        
    </div>
    <button type="button" class="btn btn-success">{{ Form::submit('Dodaj!') }}</button>
@endsection

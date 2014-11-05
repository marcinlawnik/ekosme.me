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
@endsection

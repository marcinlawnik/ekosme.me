@extends('admin.main')

@section('content')
Edit MEME:

{{ Form::open(array('url' => '/a/meme/edit')) }}
Plik:
<img class="" title="{{ $meme->name }}" src="{{ $image }}">
<br>
Tytuł:
{{ Form::text('title', $meme->name) }}
<br>
Opis:
{{ Form::text('description', $meme->description) }}
<br>
Edycja Kodów
<br>
{{ Form::submit('Edytuj!') }}

{{ Form::close() }}
@endsection
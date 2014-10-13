Edit MEME:

{{ Form::open(array('url' => '/a/meme/edit')) }}
Plik:
<img class="" title="{{ $meme->name }}" src="{{ $images[$meme->id] }}">
<br>
Tytuł:
{{ Form::text('title') }}
<br>
Opis:
{{ Form::text('description') }}
<br>
Edycja Kodów
<br>
{{ Form::submit('Edytuj!') }}

{{ Form::close() }}
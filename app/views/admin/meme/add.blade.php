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
ilosc kodow:
{{ Form::number('code_amount') }}
<br>

Opis:
{{ Form::text('pass') }}
<br>
{{ Form::submit('Dodaj!') }}

{{ Form::close() }}
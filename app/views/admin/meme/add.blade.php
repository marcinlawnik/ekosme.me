Add MEME:

{{ Form::open(array('url' => '/a/add', 'files' => true)) }}
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
{{ Form::submit('Dodaj!') }}

{{ Form::close() }}
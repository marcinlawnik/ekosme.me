@extends('admin.main')

@section('content')
<table class="table table-responsive table-bordered table-striped">

  <tr>
    <td>Obrazek</td>
    <td>Tytuł</td>
    <td>Opis</td>
    <td>Nazwa pliku</td>
    <td>Ilość kodów</td>
    <td>Kody użyte</td>
    <td>Kody wysłane</td>
    <td>Kody wolne</td>
    <td>Wyświetl</td>
    <td>Edytuj</td>
  </tr>

@foreach($memes as $meme)
  <tr>
    <td>
        <a href="/images/{{ $meme->filename }}" data-lightbox="meme" data-title="{{ $meme->name }}">
            <img class="meme-thumbnail" title="{{ $meme->name }}" src="/images/{{ $meme->filename }}">
        </a>
    </td>
    <td>{{ $meme->name }}</td>
    <td>{{ $meme->description }}</td>
    <td>{{ $meme->filename }}</td>
    <td>{{ $info[$meme->id]['code_amount'] }}</td>
    <td>{{ $info[$meme->id]['code_used'] }}</td>
    <td>{{ $info[$meme->id]['code_sent'] }}</td>
    <td>{{ $info[$meme->id]['code_unused'] }}</td>
    <td>
        <a class="btn btn-default btn-success" href="{{ URL::to('v/'.$info[$meme->id]['hash']) }}">Wyświetl</a>
    </td>
    <td>
        <a class="btn btn-default btn-info" href="{{ URL::to('a/meme/edit/'.$meme->id) }}">Edytuj</a>
    </td>
  </tr>
@endforeach

</table>
@endsection
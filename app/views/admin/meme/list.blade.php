@extends('admin.main')

@section('content')
<table style="width:100%">

  <tr>
    <td>Obrazek</td>
    <td>Tytuł</td>
    <td>Opis</td>
    <td>Nazwa pliku</td>
    <td>Ilość kodów</td>
    <td>Kody użyte</td>
    <td>Kody wysłane</td>
    <td>Kody wolne</td>
    <td>EDYTUJ</td>
  </tr>

@foreach($memes as $meme)
  <tr>
    <td><img class="" title="{{ $meme->name }}" src="{{ $images[$meme->id] }}"></td>
    <td>{{ $meme->name }}</td>
    <td>{{ $meme->description }}</td>
    <td>{{ $meme->filename }}</td>
    <td>{{ $info[$meme->id]['code_amount'] }}</td>
    <td>{{ $info[$meme->id]['code_used'] }}</td>
    <td>{{ $info[$meme->id]['code_sent'] }}</td>
    <td>{{ $info[$meme->id]['code_unused'] }}</td>
    <td>{{ URL::to('a/meme/edit/'.$meme->id) }}</td>
  </tr>
@endforeach

</table>
@endsection
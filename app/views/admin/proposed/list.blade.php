@extends('admin.main')

@section('content')
    <table class="table table-responsive table-bordered table-striped">

        <tr>
            <td>Obrazek</td>
            <td>Nazwa pliku</td>
            <td>E-mail</td>
            <td>Opis</td>
        </tr>

        @foreach($proposed as $proposition)
            <tr>
                <td>
                    <a href="/images/{{ $proposition->filename }}" data-lightbox="meme">
                        <img class="meme-thumbnail" title="{{ $meme->filename }}" src="/images/{{ $proposition->filename }}">
                    </a>
                </td>
                <td>{{ $proposition->filename }}</td>
                <td>{{ $proposition->email }}</td>
                <td>{{ $proposition->description }}</td>
            </tr>
        @endforeach

    </table>
@endsection
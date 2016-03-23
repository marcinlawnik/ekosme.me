@extends('admin.main')

@section('content')
    <div class="container-fluid">
        <table class="table table-responsive table-bordered table-striped">

            <tr>
                <td>Obrazek</td>
                <td>Tytuł</td>
                <td>Opis</td>
                <td>Czy widział?</td>
                <td>Wyślij</td>
            </tr>

            @foreach($memes as $meme)
                <tr>
                    <td>
                        <img class="meme-thumbnail" title="{{ $meme->name }}" src="/images/{{ $meme->filename }}">
                    </td>
                    <td>{{ $meme->name }}</td>
                    <td>{{ $meme->description }}</td>
                    <td>{{ var_dump(in_array($meme->id, $sent)) }}</td>
                    <td>
                        <a class="btn btn-default btn-success" href="{{ URL::to('v/') }}">Wyświetl</a>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
    <!-- /.container-fluid -->
@endsection
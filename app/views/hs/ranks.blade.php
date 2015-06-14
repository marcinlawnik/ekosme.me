@extends('main')

@section('head')
    <style>
        .container {
            text-align: center;
        }
    </style>
@endsection

@section('content')
    @include('hs.nav')
    @include('messages')
    <div class="container">
        <img src="http://upload.wikimedia.org/wikipedia/en/1/1c/Hearthstone_Logo.png">
        <p>RANKING</p>

        <table class="table">
            <thead>
                <td>Imie</td>
                <td>Nazwisko</td>
                <td>MeczeWygrane</td>
                <td>MeczePrzegrane</td>
                <td>EmailRejestracji</td>
            </thead>
        </table>

        <hr>
        @include('hs.footer')
    </div>
@endsection
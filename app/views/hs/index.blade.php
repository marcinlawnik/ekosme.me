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
    <img src="https://eu.battle.net/hearthstone/static/images/logos/logo.png">
    <h2>Witaj,<br/>
            Czy chcesz zagrać w ekosowym turnieju hearthstone'a?<br/>
            Jeśli tu jesteś to chyba tak?<br/>
            Zarejestruj się i zmierz się ze znajomymi!</h2>
    <br/>
    @include('hs.footer')
    </div>
@endsection

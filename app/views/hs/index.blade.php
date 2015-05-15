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
    <div class="container">
    <img src="http://upload.wikimedia.org/wikipedia/en/1/1c/Hearthstone_Logo.png">
    <h2>Witaj,<br/>
            Czy chcesz zagrać w ekosowym turnieju hearthstone'a?<br/>
            Jeśli tu jesteś to chyba tak?<br/>
            Zarejestruj się i zmierz się ze znajomymi!</h2>
    <br/>
        <a href="{{ URL::to('hs/rules')  }}">
            <img src="http://imgup.pl/di/DMRN/zasady.png"/>
        </a>
        <a href="ranking.html">
            <img src="http://imgup.pl/di/Q3Z6/ranking.png"/>
        </a>
        <a href="rejestracja.html">
            <img src="http://imgup.pl/di/LNQB/rejestracja.png"/>
        </a>
        <img src="http://imgup.pl/di/CGMA/t-o.png">

    @include('hs.footer')
    </div>
@endsection
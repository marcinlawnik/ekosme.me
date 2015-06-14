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
        <h1>Rejestracja</h1>

        <iframe src="https://docs.google.com/a/ekos.edu.pl/forms/d/1JhSQILo-RCVIbonbPVYQirNhI7UWQvi8C1i5tJZi7e8/viewform?embedded=true" width="100%" height="1200px" frameborder="0" marginheight="0" marginwidth="0">Ładowanie...</iframe>

        @include('hs.footer')
    </div>
@endsection

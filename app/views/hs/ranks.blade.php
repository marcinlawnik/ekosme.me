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
        <p>RANKING</p>
            <iframe width="100%" height="350px" src="https://docs.google.com/spreadsheets/d/1tDrspJY6s_0eCeLfocPVH77MgqDei8XKdKcH-SQ8tsE/pubhtml?gid=719055177&single=true&widget=true&headers=false"></iframe>
        <hr>
        @include('hs.footer')
    </div>
@endsection
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
            <iframe width="100%" height="700px" src="https://docs.google.com/spreadsheets/d/1tDrspJY6s_0eCeLfocPVH77MgqDei8XKdKcH-SQ8tsE/pubhtml?gid=719055177&single=true&widget=true&headers=false"></iframe>
        <hr>
        @include('hs.footer')
    </div>
@endsection
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

        <p>Marcin Ławniczak: <a href="mailto:marcin@lawniczak.me">marcin@lawniczak.me</a> - sprawy organizacyjne</p>

        @include('hs.footer')
    </div>
@endsection
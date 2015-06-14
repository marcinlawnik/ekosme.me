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
    <h2>Witaj,<br/>
            Czy chcesz zagrać w ekosowym turnieju hearthstone'a?<br/>
            Jeśli tu jesteś to chyba tak?<br/>
            Zarejestruj się i zmierz się ze znajomymi!</h2>
    <br/>
    <a class="twitter-timeline"  href="https://twitter.com/EKOSTurniejHS" data-widget-id="604312504324460544">Tweety użytkownika @EKOSTurniejHS </a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

    @include('hs.footer')
    </div>
@endsection

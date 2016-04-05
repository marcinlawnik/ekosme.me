@extends('main')

@section('head')
<style>
#dyrkoimg
{
    margin-top: 15%;
    margin-bottom: 0;
}
ton_container
{
}
.menu-button {
    margin-top: 3%;
}
/* centered columns styles */
.row-centered {
    text-align:center;
}
.col-centered {
    display:inline-block;
    float:none;
    /* reset the text-align */
    text-align:left;
    /* inline-block space fix */
    margin-right:-4px;
}
div#formsend{
   
    margin-top: 2%;
}
#topimg{
    margin-bottom: 0;
}
</style>
@endsection

@section('content')

<div class="row">
    <div class="col s4 offset-s4" id="topimg">
        <div class="responsive-img" id="dyrkoimg">
        {{ HTML::image('logo_small.png', 'logo', ['id' => 'logo']) }}
    </div>
    </div>
    </div>
    <div class="row" id="form">
    <div class="input-field col s5 offset-s3">
        @include('messages')
        {{ Form::open(array('url' => '/r', 'method' => 'get')) }}
        <input id="placeholder" type="text" class="validate">
        <label for="icon_prefix">WERSJA DEWELOPERSKA</label>
    </div>
    <div class="btn col s1" id="formsend">
        <i class="material-icons suffix">send</i>
    </div>
     {{ Form::close() }}
</div>

        <div class="container">
            {{-- top row of buttons --}}
            <div id="button_container" class="row row-centered">
                <div class="col-sm-4 col-centered">
                    <a href="{{ URL::to('suggest') }}">
                        <button id="top" type="button" class="btn btn-lg btn-warning menu-button btn-block">Zaproponuj mema</button>
                    </a>
                </div>
                <div class="col-sm-4 col-centered">
                    <a href="{{ URL::to('top') }}">
                        <button id="top" type="button" class="btn btn-lg btn-error menu-button btn-block">Najlepsze memy</button>
                    </a>
                </div>
                <div class="col-sm-4 col-centered">
                    <a href="{{ URL::to('skins') }}">
                        <button id="skins" type="button" class="btn btn-lg btn-info menu-button btn-block">Skiny do dziennika</button>
                    </a>
                </div>
            </div>
            {{-- lower row of buttons --}}
            <div id="button_container" class="row row-centered">
                <div class="col-sm-6 col-centered">
                    <a href="{{ URL::to('hs') }}">
                        <button id="hs" type="button" class="btn btn-lg btn-primary menu-button btn-block">Turniej HS</button>
                    </a>
                </div>
                <div class="col-sm-6 col-centered">
                    <a href="{{ URL::to('subscribe') }}">
                        <button id="subscribe" type="button" class="btn btn-lg btn-success menu-button btn-block">Zasubskrybuj!</button>
                    </a>
                </div>
            </div>
            {{-- even lower of buttons --}}
            <div id="button_container" class="row row-centered">
                <div class="col-sm-12 col-centered">
                    <a href="{{ URL::to('mustknow') }}">
                        <button id="mustknow" type="button" class="btn btn-lg btn-info menu-button btn-block">Rzeczy, które uczeń EKOSu wiedzieć powinien.</button>
                    </a>
                </div>
            </div>
            {{-- lowest row of buttons --}}
            <div id="button_container" class="row row-centered">
                <div class="col-sm-12 col-centered">
                    <a href="{{ URL::to('download/reports/artykul.pdf') }}">
                        <button id="article" type="button" class="btn btn-lg btn-success menu-button btn-block">"Szkoła. Prosimy nie potrząsać" - Artykuł</button>
                    </a>
                </div>
            </div>
        </div>
        <div id="stats_container">
            <p class="alert alert-info col-sm-12" style="margin-top: 2%">
                Nasz ostatni mem, <strong>"{{ $stats['meme_title'] }}"</strong>,
                obejrzało <strong>{{ $stats['memes_opened'] }}</strong> z <strong>{{ $stats['memes_sent'] }}</strong>
                ({{ $stats['memes_opened_percentage'] }}%).
                Zagłosowało: <strong>{{ $stats['votes'] }}</strong> z <strong>{{ $stats['memes_opened'] }}</strong> ({{ $stats['voted_percentage'] }}%).
                Podobało się: <strong>{{ $stats['votes_like'] }}</strong> ({{ $stats['votes_like_percentage'] }}%).
                Nie podobało się: <strong>{{ $stats['votes_dislike'] }}</strong> ({{ $stats['votes_dislike_percentage'] }}%).
            </p>
        </div>
        <div id="ads_container" class="">
        </div>
 </div>
 


@endsection

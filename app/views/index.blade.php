@extends('main')

@section('head')
<style>
#imaginary_container
{
    margin-top: 15%;
}
#logo
{
    display: block;
    margin-left: auto;
    margin-right: auto;
}
#button_container
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
</style>
@endsection

@section('content')

<div class="row">
    <div class="input-field col s6 offset-s3">
            <input value="WERSJA DEWELOPERSKA" id="placeholder" type="text" class="validate">
            <label class="active" for="meme_link">
              @include('messages')
            {{ HTML::image('logo_small.png', 'logo', ['id' => 'logo']) }}
            {{ Form::open(array('url' => '/r', 'method' => 'get')) }}
            </label>
            <div class="btn" type="submit">
            <span><i class="medium material-icons">play_arrow</i></span>
            </div>
            </div>
            {{ Form::close() }}
        </div>
        <div class="container-fluid">
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
</div>

@endsection

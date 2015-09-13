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
   float: right;
}
.menu-button {
    margin-top: 3%;
}
</style>
@endsection

@section('content')

<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div id="imaginary_container">
            @include('messages')
            {{ HTML::image('logo_small.png', 'logo', ['id' => 'logo']) }}
            {{ Form::open(array('url' => '/r', 'method' => 'get')) }}
            <div class="input-group input-group-lg">
                {{ Form::text('code', '', ['class'=>'form-control', 'placeholder' => 'Podaj kod dostępu do mema']) }}
                <span class="input-group-btn">
                    <button class="btn btn-default btn-lg" type="submit"><span class="glyphicon glyphicon-play"></span></button>
                </span>
            </div>
            {{ Form::close() }}
        </div>
        <div id="button_container">
            <a href="{{ URL::to('suggest') }}">
                <button id="top" type="button" class="btn btn-lg btn-warning menu-button">Zaproponuj mema</button>
            </a>
            <a href="{{ URL::to('top') }}">
                <button id="top" type="button" class="btn btn-lg btn-error menu-button">Najlepsze memy</button>
            </a>
            <a href="{{ URL::to('skins') }}">
                <button id="skins" type="button" class="btn btn-lg btn-info  menu-button">Skiny do dziennika</button>
            </a>
            {{--<a href="{{ URL::to('hs') }}">--}}
                {{--<button id="hs" type="button" class="btn btn-lg btn-warning  menu-button">Turniej HS</button>--}}
            {{--</a>--}}
            <a href="{{ URL::to('subscribe') }}">
                <button id="subscribe" type="button" class="btn btn-lg btn-success  menu-button">Zasubskrybuj!</button>
            </a>
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
        <div id="ads_container" class="alert alert-info">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- main page ekosme.me -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-6563463508590145"
                 data-ad-slot="5702552510"
                 data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
</div>

@endsection

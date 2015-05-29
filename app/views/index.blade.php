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
#subscribe {
    margin-top: 3%;
}
#skins {
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
            <a href="{{ URL::to('hs') }}">
                <button id="hs" type="button" class="btn btn-lg btn-warning">Turniej HS</button>
            </a>
            <a href="{{ URL::to('skins') }}">
                <button id="skins" type="button" class="btn btn-lg btn-info">Skiny do dziennika</button>
            </a>
            <a href="{{ URL::to('subscribe') }}">
                <button id="subscribe" type="button" class="btn btn-lg btn-success">Zasubskrybuj!</button>
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
    </div>
</div>

@endsection

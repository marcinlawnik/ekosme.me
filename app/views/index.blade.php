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
#subscribe_container
{
   float: right;
}
#subscribe
{
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
        <div id="subscribe_container">
            <a href="{{ URL::to('subscribe') }}">
                <button id="subscribe" type="button" class="btn btn-lg btn-success">Zasubskrybuj!</button>
            </a>
        </div>
        <div id="stats_container">
            <p class="alert alert-info col-sm-12">
                Nasz ostatni mem, <strong>"{{ $stats['meme_title'] }}"</strong>,
                obejrzało {{ $stats['memes_opened'] }} z {{ $stats['memes_sent'] }}
                ({{ $stats['memes_opened_percentage'] }}%).
                Zagłosowało {{ $stats['votes'] }} z {{ $stats['memes_opened'] }} ({{ $stats['voted_percentage'] }}%).
                Podobało się <strong>{{ $stats['votes_like'] }}</strong> ({{ $stats['votes_like_percentage'] }}%).
                Nie podobało się <strong>{{ $stats['votes_dislike'] }}</strong> ({{ $stats['votes_dislike_percentage'] }}%).
            </p>
        </div>
    </div>
</div>

@endsection
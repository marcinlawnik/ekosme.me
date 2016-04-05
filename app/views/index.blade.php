@extends('main')

@section('head')
<style>
div.row{
	text-align: center;
}
#dyrkoimg
{
    margin-top: 15%;
    margin-bottom: 0;
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

{{-- top row of buttons --}}

<div class="row">
		<a class="waves-effect waves-light btn" href="{{ URL::to('suggest') }}">
			Zaproponuj mema
		</a>
		 <a class="waves-effect waves-light btn" href="{{ URL::to('top') }}">
			Najlepsze memy
		</a>
		 <a class="waves-effect waves-light btn" href="{{ URL::to('skins') }}">
			Skiny do dziennika
		</a>
</div>

{{-- lower row of buttons --}}

<div class="row">
	<a class="waves-effect waves-light btn" href="{{ URL::to('hs') }}">
			Turniej HS
		</a>
		<a class="waves-effect waves-light btn" href="{{ URL::to('subscribe') }}">
			Zasubskrybuj!
		</a>
</div>

{{-- even lower of buttons --}}

<div class="row">
		<a class="waves-effect waves-light btn" href="{{ URL::to('mustknow') }}">
			Rzeczy, które uczeń EKOSu wiedzieć powinien.
		</a>
</div>

{{-- lowest row of buttons --}}

<div class="row">
	<a class="waves-effect waves-light btn" href="{{ URL::to('download/reports/artykul.pdf') }}">
		"Szkoła. Prosimy nie potrząsać" - Artykuł
	</a>
</div>

{{-- container with stats --}}

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





@endsection

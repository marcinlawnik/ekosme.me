@extends('main')

@section('head')
    <style>
        .row
        {
            margin-top: 5%;
        }
        #meme
        {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        #progress
        {
            margin-top: 1%;
        }
    </style>
@endsection

@include('topmemesnav')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="jumbotron">
                @foreach($memes as $meme)
                    <div class="page-header">
                        <h1>
                            {{ $i++ }}: {{ $meme->name }} <small><small>{{ $meme->description }}</small></small>
                        </h1>
                    </div>
                    <div class="">
                        <img id="meme" class="img-responsive img-thumbnail" title="{{ $meme->name }}" src="{{ '/images/'.$meme->filename }}">
                            <div class="panel-footer text-center">

                                <p>Głosów: {{ $meme->codes()->whereNotNull('vote')->count()}}</p>
                                <p>Procent "Spoko": {{ round($meme->codes()->where('vote', '=', '1')->count() / $meme->codes()->whereNotNull('vote')->count() * 100, 2)}}%</p>

                            </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
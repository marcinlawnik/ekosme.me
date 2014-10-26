@extends('main)
@section('head')
    <style>
        img {
            background: lightgrey;
            color: white;
            border-radius: 1em;
            padding: 1em;
            position: absolute;
            top: 60%;
            left: 50%;
            margin-right: -50%;
            transform: translate(-50%, -50%)
        }
        p.blocktext {
            margin-left: auto;
            margin-right: auto;
            width: 10em
        }
    </style>
@endsection

@section('content')
    <h3>
        <p class="blocktext">{{{ $meme->name }}}</p>
    </h3>
    <br />
    <img class="" title="{{ $meme->name }}" src="{{{ $image }}}"></a>
    <br />

    <p class="blocktext">{{{ $meme->description }}}</p>
@endsection
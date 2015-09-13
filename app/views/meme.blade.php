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

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="jumbotron">
            <div class="page-header">
                <h1>
                    {{ $meme->name }} <small><small>{{ $meme->description }}</small></small>
                </h1>
            </div>
            <div class="">
                <img id="meme" class="img-responsive img-thumbnail" title="{{ $meme->name }}" src="{{{ $image }}}">
                @if(isset($code))
                <div class="panel-footer text-center">

                    <a href="{{ URL::to('vote/'.$code.'/1') }}" class="btn btn-success btn-lg" >Spoko</a>
                    <a href="{{ URL::to('vote/'.$code.'/0') }}" class="btn btn-danger btn-lg" >Suchar</a>

                </div>
                @endif
                <div>
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- meme page ekosme.me -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-6563463508590145"
                         data-ad-slot="8656018915"
                         data-ad-format="auto"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
                    {{{ $meme->name }}} <small><small>{{{ $meme->description }}}</small></small>
                </h1>
            </div>
            <div class="">
                <img id="meme" class="img-responsive img-thumbnail" title="{{ $meme->name }}" src="{{{ $image }}}">
                <div id="progress" class="progress">
                    <div class="progress-bar progress-bar-danger" style="width: 12.5%">
                        <span class="sr-only">35% Complete (success)</span>
                    </div>
                    <div class="progress-bar progress-bar-warning" style="width: 37.5%">
                        <span class="sr-only">20% Complete (warning)</span>
                    </div>
                    <div class="progress-bar progress-bar-success" style="width: 50%">
                        <span class="sr-only">10% Complete (danger)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
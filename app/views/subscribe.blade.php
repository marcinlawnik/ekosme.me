@extends('main')

@section('head')
<style>
#subscribtion_container
{
    margin-top: 15%;
}
#logo
{
    display: block;
    margin-right: auto;
    margin-left: auto;
}
.promise {
    color: #999;
}
#title
{
    text-align: center;
    margin-bottom: 15px;
}
#back
{
    margin-top: 1%;
    display: block;
    margin-right: auto;
    margin-left: auto;
}
</style>
@endsection

@section('content')
<div class="row">
    <div id="subscribtion_container" class="col-md-6 col-md-offset-3">
        <div class="well">
            <div id="title">
                <h1>Zasubskrybuj memy od ekosme.me</h1>
                <p>Podaj adres e-mail w domenie ekos.edu.pl</p>
            </div>
            <div id="content">
            @include('messages')
            {{ HTML::image('/images/logo_mini.png', 'logo', ['id' => 'logo']) }}
                {{ Form::open(array('url' => '/subscribe')) }}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-envelope"></span>
                        </span>
                        {{ Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'imie_nazwisko@ekos.edu.pl'])}}
                        <span class="input-group-btn">
                            {{ Form::submit('Zasubskrybuj!', ['class' => 'btn btn-success', 'id' => 'button']) }}
                        </span>
                    </div>
                {{ Form::close() }}
                <button class="btn btn-default" id="back"><a href="{{ URL::to('/') }}">Powrót</a></button>
            </div>
        </div>
        <small class="promise"><em>Tylko najlepsze memy (albo największe suchary).</em></small>
    </div>
</div>
@endsection
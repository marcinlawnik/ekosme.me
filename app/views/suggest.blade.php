@extends('main')
@section('head')
    <title>
        Zaproponuj mema!
    </title>
    <style>
        .jumbotron {
            margin-top: 10% !important;
        }
        .content {
            margin-bottom: 5%;
        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="jumbotron">
                @include('messages')
                <div class="page-header">
                    <h1>
                        Zaproponuj mema!
                    </h1>
                </div>
                <div class="content">
                    <p>
                        Tutaj możesz zaproponować nowego mema (Musi to być obrazek do 5MB):
                    </p>

                    {{ Form::open(array('url' => '/suggest', 'files' => true)) }}

                    {{ Form::file('meme') }}
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Email (nieobowiązkowy)</span>
                        {{ Form::email('email' , '' , array('id' => 'inputsm' , 'class' => 'form-control')) }}
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Opis (nieobowiązkowy)</span>
                        {{ Form::text('description' , '' , array( 'id' => 'inputsm' , 'class' => 'form-control')) }}
                    </div>
                    <br>
                    {{ Form::submit('Zaproponuj!' , array( 'class' => 'btn btn-success pull-right')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
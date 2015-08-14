@extends('main')
@section('head')
    <title>
        Zaproponuj mema!
    </title>
    <style>

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
                <div class="">
                    <p>
                        Tutaj możesz zaproponować nowego mema do ekosme.me:
                    </p>

                    {{ Form::open(array('url' => '/suggest', 'files' => true)) }}

                    {{ Form::file('meme') }}
                    <div class="input-group">
                        <span class="input-group-addon">Email (nieobowiązkowy)</span>
                        {{ Form::email('email' , '' , array('id' => 'inputsm' , 'class' => 'form-control')) }}
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">Opis (nieobowiązkowy)</span>
                        {{ Form::text('description' , '' , array( 'id' => 'inputsm' , 'class' => 'form-control')) }}
                    </div>
                    {{ Form::submit('Zaproponuj!' , array( 'class' => 'btn btn-success')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
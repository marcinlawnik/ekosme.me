@extends('main')

@section('head')
    <style>
        .container {
            text-align: center;
        }
    </style>
@endsection

@section('content')
    @include('hs.nav')
    <div class="container">
        <img src="http://upload.wikimedia.org/wikipedia/en/1/1c/Hearthstone_Logo.png">
        <h1>Rejestracja</h1>

        {{ Form::open(array('url' => '/subscribe', 'class'=>'form-horizontal') ) }}
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    {{ Form::text('name', '', ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Imię'])}}
                </div>
            </div>
            <div class="form-group">
                <label for="surname" class="col-sm-2 control-label">Nazwisko</label>
                <div class="col-sm-10">
                    {{ Form::text('surname', '', ['class' => 'form-control', 'id' => 'surname', 'placeholder' => 'Nazwisko'])}}
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email z BattleNetu</label>
                <div class="col-sm-10">
                    {{ Form::email('email', '', ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'E-mail z BattleNetu'])}}
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Hasło</label>
                <div class="col-sm-10">
                    {{ Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Hasło'])}}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {{ Form::submit('Zarejestruj!', ['class' => 'btn btn-success', 'id' => 'button']) }}
                </div>
            </div>
        {{ Form::close() }}


        <div class="input-group">




        </div>


        @include('hs.footer')
    </div>
@endsection
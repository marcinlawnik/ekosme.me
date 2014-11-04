@extends('admin.main')

@section('content')

Add MEME:



<div class="container">
    <div class="row">
        <div class="row">          
            <div class="col-lg-6">
                <div class="input-group">
                    <span class="input-group-addon">Tytuł</span>
                    {{ Form::text('title') }}
                </div>
            </div>
        </div>
        
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="row">          
            <div class="col-lg-6">
                <div class="input-group">
                    <span class="input-group-addon">Opis</span>
                    {{ Form::text('description') }}
                </div>
            </div>
        </div>
        
    </div>
    </div>
    {{ Form::submit('Dodaj!) }}
    {{ Form::close() }}
@endsection

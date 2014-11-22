@extends('admin.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        {{ Form::open(['url' => 'a/mail/send', 'class' => 'form-horizontal']) }}
            <fieldset>
                <!-- Name input-->
                <div class="form-group">
                    <div class="col-md-12">
                        {{ Form::text('topic', '', ['placeholder' => 'Temat', 'class' => 'form-control']) }}
                    </div>
                </div>

                <!-- Message body -->
                <div class="form-group">
                    <div class="col-md-12">
                        {{ Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Treść', 'rows' => 7]) }}
                    </div>
                </div>

                <!-- Form actions -->
                <div class="form-group">
                    <div class="col-md-12 text-right">
                        {{ Form::submit('Wyślij', ['class' => 'btn btn-success btn-lg']) }}
                    </div>
                </div>
            </fieldset>
        {{ Form::close() }}
    </div>
</div>
@endsection
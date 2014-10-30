@extends('admin.main')

@section('content')
{{ Form::open() }}
Wyślij mema:<br>

{{ Form::text('meme_id', $id) }}<br>
<br>
Emaile?<br>

{{ Form::submit('Wyślij!', ['class' => 'btn btn-success']) }}<br>
{{ Form::close() }}
@endsection
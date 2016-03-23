@extends('admin.main')

@section('content')
    <div class="container-fluid">
        <table class="table table-responsive table-bordered table-striped">

            <tr>
                <td>id</td>
                <td>mail</td>
                <td>active</td>
                <td>memy</td>
            </tr>

            @foreach($subscribers as $subscriber)
                <tr>
                    <td>{{ $subscriber->id }}</td>
                    <td>{{ $subscriber->email }}</td>
                    <td>{{ $subscriber->active }}</td>
                    <td><a href="{{ URL::to('a/resend/'.$subscriber->id) }}">pokaż</a> </td>
                </tr>
            @endforeach

        </table>
    </div>
    <!-- /.container-fluid -->
@endsection
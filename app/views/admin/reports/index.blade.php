@extends('admin.main')

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>Subscriber #</th>
                <th>Email</th>
                <th>Join Date</th>
                <th>Raport</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subscribers as $subscriber)
                <tr>
                    <td>{{ $subscriber->id }}</td>
                    <td>{{ $subscriber->email }}</td>
                    <td>{{ $subscriber->updated_at }}</td>
                    <td><a class="btn btn-default btn-info" href="{{ URL::to('a/reports/' . $subscriber->id) }}">Raport</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
@extends('admin.main')

@section('content')
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>Subscriber #</th>
                <th>Email</th>
                <th>Join Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subscribers as $subscriber)
                <tr>
                    <td>{{ $subscriber->id }}</td>
                    <td>{{ $subscriber->email }}</td>
                    <td>{{ $subscriber->updated_at }}</td>
                    <td>EDIT</td>
                    <td>DELETE</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
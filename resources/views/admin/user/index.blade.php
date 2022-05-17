@extends('layouts.admin')

@section('content')
@if ($message = session('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif
<div class="card">
    <div class="card-header">
        <h1>Users Page</h1>
        <a href="{{ route('create-user') }}" class="btn btn-primary">Add User!</a>
        <hr>
    </div>
    <div class="card-body">
        <table class="table table-responsive table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($user as $item)
                <tr class="border">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email == 'admin@admin.com' ? 'Admin' : 'User'}}</td>
                    <td>
                        <a href="{{route('edit-user',$item->id)}}" class="btn btn-primary">Edit</a>
                        {{-- replace anchor with form which method is delete --}}
                        <form method="POST" style="display: inline;" action="{{route('delete-user',$item->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" style="display: inline;" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection
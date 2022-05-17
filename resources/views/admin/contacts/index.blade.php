@extends('layouts.admin')

@section('content')
@if ($message = session('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif
    <div class="card">
        <div class="card-header">
            <h1>Contacts Page</h1>
            <hr>
        </div>
        <div class="card-body table-responsive ">
            <table class="table table-bordered table-striped overflow-auto">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach($contacts as $item)
                    <tr class="border">
                        <td>{{ $item->id }}</td>
                        <td ><a href="mailto:{{ $item->email }}">{{ $item->email }}</a></td>
                        <td >{{ $item->message }}</td>
                        <td>
                            <form style="display:inline-block" action="{{ route('admin-contacts.destroy',$item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-primary" type="submit">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit User</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('update-user',$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                <div class="col-md-6 mb-3" >
                        <label for="">Name</label>
                        <input value="{{ $user->name }}" id="add-name" type="text" class="form-control" name="name">
                        <hr>
                    </div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Email</label>
                        <input value="{{ $user->email }}" id="add-email" type="text" class="form-control" name="email">
                        <hr>
                    </div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Password</label>
                        <input id="new-password" type="password" class="form-control" name="password">
                        <hr>
                    </div>
                    <div class="col-mid-12">
                        <button type="submit" class="btn btn-primary">Edit User</button>
                    </div>


                </div>
            </form>
        </div>
        @if ($boards->count()>0)
        <div class="card-body table-responsive ">
            <table class="table table-bordered overflow-auto">
                <thead>
                    <tr>
                        <th>Board ID</th>
                        <th>Board Name</th>
                        <th>Board Tasks</th>
                        <th>Board Description</th>
                        {{-- <th>Delete</th> --}}
                    </tr>
                </thead>
                <tbody >
                    {{-- {{dd($tasks)}} --}}
                    @foreach($boards as $item)
                    <tr class="border">
                        <td>{{ $item->id }}</td>
                        <td>{{$item->board_name}}</td>
                        <td>{{$tasks[$loop->index]['tasks']}}</td>
                        <td>{{ $item->board_description }}</td>
                        {{-- <td>
                            <form style="display:inline-block" action="{{ route('admin-contacts.destroy',$item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-primary" type="submit">Delete</button>
                            </form>
    
                        </td> --}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
@endsection
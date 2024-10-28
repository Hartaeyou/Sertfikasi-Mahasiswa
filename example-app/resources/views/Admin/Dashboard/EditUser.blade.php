@extends('Admin.layout.main')
@section('title', 'Edit User')
@section('content')


<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit User</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateUser', $user->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin
                                </option>
                                <option value="Student" {{ $user->role == 'Student' ? 'selected' : '' }}>Student
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>  

@endsection
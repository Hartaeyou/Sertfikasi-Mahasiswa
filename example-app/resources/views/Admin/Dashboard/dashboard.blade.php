@extends('Admin.layout.main')
@section('title', 'Edit User')
@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 200vh; height: auto">
            <div class="card-body">
                <h5 class="card-title text-center">Edit User</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                        @if($user->role == 'admin')
                        @continue
                        @endif  
                        <tr>
                            <th scope="row">{{ $key  }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('editUser', $user->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('deleteUser', $user->id) }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


@endsection

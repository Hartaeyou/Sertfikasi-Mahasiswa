@extends('Admin.layout.main')
@section('title', 'Edit Register')
@section('content')



<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 200vh; height: auto">
            <div class="card-body">
                <h5 class="card-title text-center">Edit User</h5>
                <form action="{{ route('tableRegister') }}">
                    <input type="search" class="my-3 w-50 form-control" name="search" id="inlineFormInputGroup"
                        placeholder="Search....">
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Kota</th>
                            <th scope="col">Provinsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registers as $key => $register)
                        <tr>
                            <th scope="row">{{ $key +1 }}</th>
                            <td>{{ $register->name }}</td>
                            <td>{{ $register->email }}</td>
                            <td>{{ $register->city->name }}</td>
                            <td>{{ $register->city->province->name }}</td>
                            <td>
                                <a href="{{ route('editRegister', $register->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                </table>
                <div class="d-flex justify-content-end">
                    {{ $registers->appends(['search' => request('search')])->links() }}
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
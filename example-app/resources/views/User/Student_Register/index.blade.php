@extends('User.layout.main')
@section('title', 'Daftar kuliah')
@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 200vh; height: auto">
            <div class="card-body">
                <h5 class="card-title text-center">Form Daftar</h5>
                <div class="row mt-3">
                    <form action="{{ route('student.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="mt-2">
                            <label for="Name" class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="Name" name="Name" placeholder="Name"
                                value="{{ old('Name') }}">
                        </div>
                        <div class="mt-2">
                            <label for="address" class="form-label">Alamat KTP<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address" name="address"
                                aria-describedby="addressHelp" placeholder="address"
                                value="{{ old('address') }}">
                        </div>
                        <div class="mt-2">
                            <label for="address_now" class="form-label">Alamat Lengkap Saat Ini<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address_now" name="address_now"
                                aria-describedby="address_nowHelp" placeholder="address_now"
                                value="{{ old('address_now') }}">
                        </div>
                        <div class="mt-2">
                            <label for="province" class="form-label">Provinsi<span class="text-danger">*</span></label>
                            <select class="form-select" id="province" aria-label="Default select example"
                                name="province">
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-2">
                            <label for="city" class="form-label">Kota<span class="text-danger">*</span></label>
                            <select class="form-select" name="city" id="city" aria-label="Default select example">
                                <option selected>Pilih Provinsi</option>

                            </select>
                        </div>
                        <div class="mt-2">
                            <label for="distrinct" class="form-label">Kecamatan <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="distrinct" name="distrinct"
                                placeholder="distrinct" value="{{ old('distrinct') }}">
                        </div>
                        <div class="mt-2">
                            <label for="subdistrinct" class="form-label">Kelurahan<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="subdistrinct" name="subdistrinct"
                                placeholder="subdistrinct" value="{{ old('subdistrinct') }}">
                        </div>
                        <div class="mt-2">
                            <label for="Phone" class="form-label">Nomor Handphone <span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="Phone" name="Phone" placeholder="Phone"
                                value="{{ old('Phone') }}">
                        </div>
                        <div class="mt-2">
                            <label for="Email" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="Email" name="Email" placeholder="Email"
                                value="{{ old('Email') }}">
                        </div>
                        <div class="mt-2">
                            <label for="citizenship" class="form-label">kewarganegaraan<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="citizenship" name="citizenship"
                                placeholder="citizenship" value="{{ old('citizenship') }}">
                        </div>
                        <div class="mt-2">
                            <label for="born_date" class="form-label">Tanggal Lahir<span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="born_date" name="born_date"
                                placeholder="born_date" value="{{ old('born_date') }}">
                        </div>
                        <div class="mt-2">
                            <label for="born_place" class="form-label">Tempat Lahir<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="born_place" name="born_place"
                                placeholder="born_place" value="{{ old('born_place') }}">
                        </div>
                        <div class="mt-2">
                            <label for="gender" class="form-label">gender<span class="text-danger">*</span></label>
                            <select name="gender" class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="mt-2">
                            <label for="maried" class="form-label">Status Nikah<span
                                    class="text-danger">*</span></label>
                            <select name="marital_status" class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Lain-Lain">Lain-Lain</option>
                            </select>
                        </div>
                        <div class="mt-2">
                            <label for="gender"  class="form-label">Agama<span
                                    class="text-danger">*</span></label>
                            <select name="religion"class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                                <option value="Lain-Lain">Lain-Lain</option>
                            </select>
                        </div>
                        <div class="mt-2">
                            <label for="inputGroupFile02">KTP <span class="text-danger">*</span></span></label>
                            <input name="ktp_file" type="file" class="form-control" id="inputGroupFile02">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary " name="login">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function () {
        $("#province").on('change', function () {
            let id_province = $('#province').val();
            $.ajax({
                type: "post",
                url: "{{ route('getcity') }}",
                data: {
                    id_province: id_province,
                    _token: '{{ csrf_token() }}'
                },
                cache: false,
                success: function (msg) {
                    $("#city").html(msg);
                },
                error: function (data) {
                    console.log('error', data);
                }
            });
        });
    });

</script>

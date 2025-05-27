@extends('theme.default')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Data kustomers</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Kustomer</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <form action="{{ route('kustomers.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="font-weightbold">nik</label>
                                    <input type="number" class="form-control 
                                        @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}"
                                        placeholder="Masukkan Nik">
                                    <!-- error message untuk nik -->
                                    @error('nik')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="font-weightbold">name</label>
                                    <input type="text" class="form-control 
                                        @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                                        placeholder="Masukkan name">
                                    <!-- error message untuk name -->
                                    @error('name')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="font-weightbold">telp</label>
                                    <input type="number" class="form-control 
                                    @error('telp') is-invalid @enderror" name="telp" value="{{ old('telp') }}"
                                    placeholder="Masukkan no telpon">
                                    <!-- error message untuk telp -->
                                    @error('telp')
                                    <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weightbold">email</label>
                                <input type="text" class="form-control 
                                    @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                    placeholder="Masukkan Email">
                                <!-- error message untuk email -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weightbold">alamat</label>
                                <input type="text" class="form-control 
                                    @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}"
                                    placeholder="Masukkan alamat">
                                <!-- error message untuk alamat -->
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div class="mt-3">
                                <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('alertload')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bu
            ndle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.24.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
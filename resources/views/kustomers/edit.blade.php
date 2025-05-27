@extends('theme.default')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">kustomer</h1>
        <ol class="breadcrumb mb4">
            <li class="breadcrumb-item"><a href="/kustomers">kustomer
                </a></li>
            <li class="breadcrumb-item active">Edit Data kustomer</li>
        </ol>
        <div class="card mc-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow-sm rounded">
                            <div class="card-body">
                                <form action="{{ route( 'kustomers.update', $kustomer->id ) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-3">
                                        <label class="font-weight bold">nik</label>
                                        <!-- error message untuk nik -->
                                        <input type="number"class="form-control @error('nik') is-invalid @enderror" name="nik"
                                                    value="{{ old('price', $kustomer->nik) }}" placeholder="Masukkan judul kustomer">
                                        @error('nik')
                                        <div class="alert alert-danger  mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="font-weight bold">name</label>
                                        <!-- error message untuk name -->
                                        <input type="text"class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('price', $kustomer->name) }}" placeholder="Masukkan judul kustomer">
                                        @error('name')
                                        <div class="alert alert-danger  mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="font-weight bold">telp</label>
                                        <!-- error message untuk telp -->
                                        <input type="number"class="form-control @error('telp') is-invalid @enderror" name="telp"
                                                    value="{{ old('price', $kustomer->telp) }}" placeholder="Masukkan judul kustomer">
                                        @error('telp')
                                        <div class="alert alert-danger  mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="font-weight bold">email</label>
                                        <!-- error message untuk email -->
                                        <input type="text"class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('price', $kustomer->email) }}" placeholder="Masukkan judul kustomer">
                                        @error('email')
                                        <div class="alert alert-danger  mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="font-weight bold">alamat</label>
                                        <!-- error message untuk alamat -->
                                        <input type="text"class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                                    value="{{ old('price', $kustomer->alamat) }}" placeholder="Masukkan judul kustomer">
                                        @error('alamat')
                                        <div class="alert alert-danger  mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btnmd btn-primary me-3">UPDATE</button>
                                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                </form>
                            </div>
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
    <script src="https://cdn.ckeditor.com/4.24.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
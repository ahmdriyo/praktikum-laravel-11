@extends('theme.default')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">kustomers</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">kustomers</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <a href="{{ route('kustomers.create') }}" class="btn btn-md btn-success mb-3">ADD KUTOMER</a>
                <div class="row">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th scope="col">NIK</th>
                                <th scope="col">NAME</th>
                                <th scope="col">TELEPON</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col" style="width:20%"> ACTIONS </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kustomers as $kustomer)
                                <tr>
                                    <td>{{ $kustomer->nik}}</td>
                                    <td>{{ $kustomer->name }}</td>
                                    <td>{{ $kustomer->telp }}</td>
                                    <td>{{ $kustomer->email }}</td>
                                    <td>{{ $kustomer->alamat }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('kustomers.destroy', $kustomer->id) }}" method="POST">
                                            <a href="{{ route('kustomers.show', $kustomer->id) }}"
                                                class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('kustomers.edit', $kustomer->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data kustomers belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $kustomers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('alertload')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
@endsection
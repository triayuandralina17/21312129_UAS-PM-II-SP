@extends('layout.master')

@section('judul')
    Daftar Mahasiswa
@endsection

@push('script')
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
    <script>
        $(function(){
            $('#example1').DataTable();
        });
    </script>
@endpush

@push('style')
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
@endpush

@section('content')
<a class="btn btn-secondary mb-3" href="/npm/create">Tambah Data</a>
<table class="table" id="example1">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">NPM</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($mahasiswas as $key => $mahasiswa)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$mahasiswa->npm}}</td>
            <td>{{$mahasiswa->nama}}</td>
            <td>{{$mahasiswa->alamat}}</td>
            <td>
               <form action="/npm/{{ $mahasiswa->npm }}" method="POST">
                <a href="/npm/{{ $mahasiswa->npm }}/edit" class="btn btn-warning btn-sm">Edit</a>
                @csrf
                @method('delete')
                <button type="submit"  onclick="return confirm('Apakah anda yakin menghapus data?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">Data tidak ada</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

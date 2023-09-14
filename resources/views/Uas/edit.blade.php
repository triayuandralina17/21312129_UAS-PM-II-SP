@extends('layout.master')

@section('judul')
Edit Mahasiswa
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
<form method="post" action="/npm/{{ $mahasiswa->npm }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>NPM</label>
        <input type="text" name="npm" value="{{ $mahasiswa->npm }}" class="form-control" readonly>
    </div>
    @error('npm')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $mahasiswa->nama }}" class="form-control">
    </div>
    @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat">{{ $mahasiswa->alamat }}</textarea>
    </div>
    @error('alamat')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Ubah</button>
</form>
@endsection

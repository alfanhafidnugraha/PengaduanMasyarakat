@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection
@section('header', 'Data Petugas')
@section('title', 'Halaman Petugas')
@section('content')
    <a href="{{ route('petugas.create') }}" class="btn btn-warning mb-5 w-100">Tambah Petugas</a>
    <table id="petugasTable" class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Petugas</th>
            <th>Username</th>
            <th>Telp</th>
            <th>Level</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($petugas as $k => $v)
        <tr>
            <th>{{ $k += 1 }}</th>
            <th>{{ $v->nama_petugas }}</th>
            <th>{{ $v->username }}</th>
            <th>{{ $v->telp }}</th>
            <th>{{ $v->level }}</th>
            <td><a href="{{ route('petugas.edit', $v->id_petugas) }}" style="text-decoration: underline">Lihat</a></td>
        </tr>
        @endforeach
    </tbody>
    </table>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#petugasTable').DataTable();
        } );
    </script>
@endsection

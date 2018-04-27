@extends('layouts.managerLayout')

@section('title','Employee Sanction Index')

@section('content')
  <center>
    <h1 class="cover-heading">Halaman Sanksi Pegawai</h1>
  <br>
  <table class="table table-hover table-dark css-serial">
    <thead>
      <tr align="center">
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Kategori Pelanggaran</th>
        <th scope="col">Sanksi</th>
        <th scope="col">Tanggal Sanksi</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($datas as $data)
        <tr align="center">
          <td></td>
          <td>{{ $data->first_name }} {{ $data->last_name }}</td>
          <td>{{ $data->violation_category }}</td>
          <td>{{ $data->sanction_name }}</td>
          <td>{{ $data->created_at }}</td>
          <td>{{ $data->status }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection



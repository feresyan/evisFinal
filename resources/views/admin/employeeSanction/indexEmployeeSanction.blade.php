@extends('layouts.adminLayout')

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
        </tr>
      </thead>
      <tbody>
        @foreach($datas as $data)
          <tr align="center">
            <td></td>
            <td><a href="{{-- {{ route('employee.sanction.show', $data->id) }} --}}"> {{ $data->first_name }} {{ $data->last_name }}</a></td>
            <td>{{ $data->violation_category }}</td>
            <td>{{ $data->sanction_name }}</td>
            <td>{{ $data->created_at }}</td>
            <td>{{ $data->status }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </center>
@endsection


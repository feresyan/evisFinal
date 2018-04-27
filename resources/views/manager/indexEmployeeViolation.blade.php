@extends('layouts.managerLayout')

@section('title','Employee Violation Index')

@section('content')
  <center>
    <h1 class="cover-heading">Halaman Pelanggaran Pegawai</h1>
  <br>
  <table class="table table-hover table-dark css-serial">
    <thead>
      <tr align="center">
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Pelanggaran</th>
        <th scope="col">Kategori Pelanggaran</th>
        <th scope="col">Tanggal Pelanggaran</th>
      </tr>
    </thead>
    <tbody>
      @foreach($datas as $data)
        <tr align="center">
          <td></td>
          <td><a href="{{-- {{ route('employee.sanction.show', $data->id) }} --}}"> {{ $data->first_name }} {{ $data->last_name }}</a></td>
          <td>{{ $data->violation_name }}</td>
          <td>{{ $data->violation_category }}</td>
          <td>{{ $data->created_at}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection


@extends('layouts.adminLayout')

@section('title','Employee Layoffs Index')

@section('content')
  <center>
    <h1 class="cover-heading">Halaman PHK Pegawai</h1>
    <br>
    <table class="table table-hover table-dark css-serial">
      <thead>
        <tr align="center">
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Sanksi</th>
          <th scope="col">Tanggal PHK</th>
          <th scope="col">Alasan</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($datas as $data)
          @if($data->status == 'Disetujui')
            <tr align="center">
              <td></td>
              <td>{{ $data->first_name }} {{ $data->last_name }}</td>
              <td>{{ $data->sanction_name }}</td>
              <td>{{ $data->layoffs_date }}</td>
              <td>{{ $data->reason }}</td>
              <td>{{ $data->status }}</td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
  </center>
@endsection


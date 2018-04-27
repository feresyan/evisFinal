@extends('layouts.adminLayout')

@section('title','Index Sanction')

@section('content')
  <center>
  <h1 class="cover-heading">Halaman Sanksi</h1>
  <table class="table table-hover table-dark css-serial">
    <thead>
      <tr align="center">
        <th scope="col">No</th>
        <th scope="col">Nama Sanksi</th>
        <th scope="col">Kategori Sanksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($sanctions as $sanction)
        <form action="{{ route('sanction.update', $sanction->id) }}">
          <tr align="center">
            <td></td>
            <td><a href="{{ route('sanction.show',$sanction->id) }}">{{ $sanction->sanction_name }}</a></td>
            <td>{{ $sanction->sanction_level }}</td>
          </tr>
        </form>
      @endforeach
    </tbody>
  </table>
  <p class="lead">
    <a href="{{ route('sanction.create') }}" class="btn btn-md btn-primary">Tambah Sanksi Baru</a>
  </p>
  </main>
  </center>
@endsection


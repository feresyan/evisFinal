@extends('layouts.adminLayout')

@section('title','Index Violation')

@section('content')
  <center>
  <h1 class="cover-heading">Halaman Pelanggaran</h1>
  <br>
  <table class="table table-hover table-dark css-serial">
    <thead>
      <tr align="center">
        <th scope="col">No</th>
        <th scope="col">Nama Pelanggaran</th>
        <th scope="col">Kategori Pelanggaran</th>
      </tr>
    </thead>
    <tbody>
      @foreach($violations as $violation)
        <form action="{{ route('violation.update', $violation->id) }}">
          <tr align="center">
            <td></td>
            <td><a href="{{ route('violation.show',$violation->id) }}">{{ $violation->violation_name }}</a></td>
            <td>{{ $violation->violation_category }}</td>
          </tr>
        </form>
      @endforeach
    </tbody>
  </table>
  <br>
  <p class="lead">
    <a href="{{ route('violation.create') }}" class="btn btn-md btn-primary">Tambah Pelanggaran Baru</a>
  </p>
  </main>
  </center>
@endsection


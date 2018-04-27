@extends('layouts.adminLayout')

@section('title','Show Violation')

@section('content')
  <center>
  <h1 class="cover-heading">Pelanggaran</h1>
  <table class="table table-hover table-dark css-serial">
    <thead>
      <tr align="center">
        <th scope="col">No</th>
        <th scope="col">Nama Pelanggaran</th>
        <th scope="col">Kategori Pelanggaran</th>
        <th scope="col" colspan="2">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr align="center">
        <td></td>
        <td>{{ $violation->violation_name }}</td>
        <td>{{ $violation->violation_category }}</td>
    <td>
      <form action="{{ route('violation.edit',$violation->id)}}">
        <button class="fa fa-pencil"></button>
      </form>
    </td>
        <td>
          <form action="{{ route('violation.destroy',$violation->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="fa fa-trash"></button>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
  <a href="{{ route('violation.index') }}" class="btn btn-md btn-secondary">Kembali</a>
  </main>
  </center>
@endsection
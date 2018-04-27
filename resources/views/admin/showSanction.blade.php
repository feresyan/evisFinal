@extends('layouts.adminLayout')

@section('title','Show Sanction')

@section('content')
  <center>
  <h1 class="cover-heading">Sanksi</h1>
  <table class="table table-hover table-dark css-serial">
    <thead>
      <tr align="center">
        <th scope="col">No</th>
        <th scope="col">Nama Sanksi</th>
        <th scope="col">Kategori Sanksi</th>
        <th scope="col" colspan="2">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr align="center">
        <td></td>
        <td>{{ $sanction->sanction_name }}</td>
        <td>{{ $sanction->sanction_level }}</td>
    <td>
      <form action="{{ route('sanction.edit',$sanction->id)}}">
        <button class="fa fa-pencil"></button>
      </form>
    </td>
        <td>
          <form action="{{ route('sanction.destroy',$sanction->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="fa fa-trash"></button>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
  <a href="{{ route('sanction.index') }}" class="btn btn-md btn-secondary">Kembali</a>
  </main>
  </center>
@endsection
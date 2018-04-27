@extends('layouts.adminLayout')

@section('title','Create Violation')

@section('content')
  {{-- <main role="main" class="inner cover"> --}}
    <center>
      <h1 class="cover-heading">Create New Violaton</h1>
    </center>
    <form action="{{ route('violation.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="violationName">Nama Pelanggaran</label>
        <input type="text" class="form-control" name="violationName" placeholder="ex : steal" required>
      </div>
      <div class="form-group">
        <label for="violationCategory">Kategori Pelanggaran</label>
        <select class="form-control" name="violationCategory">
          <option value="Ringan">Ringan</option>
          <option value="Sedang">Sedang</option>
          <option value="Berat">Berat</option>
        </select>
      </div>
      <div class="text-center">
        <input type="submit" class="btn btn-success btn-block" value="Tambah"></input>
      </div>
    </form>
  {{-- </main> --}}
@endsection
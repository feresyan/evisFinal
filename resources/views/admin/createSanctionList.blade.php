@extends('layouts.adminLayout')

@section('title','Create Sanction')

@section('content')
  <main role="main" class="inner cover">
    <h1 class="cover-heading">Membuat Sanksi Baru</h1>
    <form action="{{ route('sanction.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="sanctionName">Nama Sanksi</label>
        <input type="text" class="form-control" name="sanctionName" placeholder="ex : Potong gaji" required>
      </div>
      <div class="form-group">
        <label for="violationCategory">Kategori Sanksi</label>
        <select class="form-control" name="sanctionLevel">
          <option value="SP1">SP1</option>
          <option value="SP2">SP2</option>
          <option value="SP3">SP3</option>
        </select>
      </div>
      <input type="submit" class="btn btn-success btn-block" value="Tambah"></input>

    </form>
  </main>
@endsection
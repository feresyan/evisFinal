@extends('layouts.adminLayout')

@section('title','Edit Sanction')

@section('content')
  <main role="main" class="inner cover">
    <center>
      <h1 class="cover-heading">Sunting Sanksi</h1>
    </center>
    <form action="{{ route('sanction.update', $sanction->id) }}" method="post">
      @csrf
      @method("PUT")
      <div class="form-group">
        <label for="sanctionName">Nama Sanksi</label>
        <input type="text" class="form-control" name="sanctionName" placeholder="ex : Potong Gaji" required value="{{ $sanction->sanction_name }}">
      </div>
      <div class="form-group">
        <label for="sanctionLevel">Kategori Sanksi</label>
        <select class="form-control" name="sanctionLevel">
          <option value="SP1">SP1</option>
          <option value="SP2">SP2</option>
          <option value="SP3">SP3</option>
        </select>
      </div>
      <input type="submit" class="btn btn-success btn-block" value="Update">
    </form>
  </main>
@endsection
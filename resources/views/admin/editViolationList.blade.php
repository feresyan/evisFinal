@extends('layouts.adminLayout')

@section('title','Edit Violation')

@section('content')
  <main role="main" class="inner cover">
    <center>
      <h1 class="cover-heading">Sunting Pelanggaran</h1>
    </center>
    <form action="{{ route('violation.update', $violation->id) }}" method="post">
      @csrf
      @method("PUT")
      <div class="form-group">
        <label for="violationName">Nama Pelanggaran</label>
        <input type="text" class="form-control" name="violationName" placeholder="ex : steal" required value="{{ $violation->violation_name }}">
      </div>
      <div class="form-group">
        <label for="violationCategory">Kategori Pelanggran</label>
        <select class="form-control" name="violationCategory">
          <option value="Ringan">Ringan</option>
          <option value="Sedang">Sedang</option>
          <option value="Berat">Berat</option>
        </select>
      </div>
      <input type="submit" class="btn btn-success btn-block" value="Update">
    </form>
  </main>
@endsection
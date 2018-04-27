@extends('layouts.executiveLayout')

@section('title','Employee Violation Index')

@section('content')
  {!! Charts::styles() !!}
  <br>
  <center>
    <h1>Halaman Pelanggaran Pegawai</h1>
    <br>
    <div class="app">
      {!! $chart->html() !!}
    </div>
    <br>
      <div class="app">
      {!! $chart2->html() !!}
    </div>
    <br>
    <div class="app">
      {!! $chart3->html() !!}
    </div>
    <br>
  </center>
@endsection

@section('script')
  <script src="{{ URL::asset('js/chart.min.js') }}" charset="utf-8">  </script>
  {!! Charts::scripts() !!}
  {!! $chart->script() !!}
  {!! $chart2->script() !!}
  {!! $chart3->script() !!}
@endsection

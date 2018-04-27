@extends('layouts.executiveLayout')

@section('title','Employee Sanction Index')

@section('content')
  {!! Charts::styles() !!}
  <br>
  <center>
    <h1>Halaman Sanksi Pegawai</h1>
    <br>
    <div class="app">
      {!! $chart->html() !!}
    </div>
    <br>
      <div class="app">
      {!! $chart2->html() !!}
    </div>
    <br>
  </center>
@endsection

@section('script')
  <script src="{{ URL::asset('js/chart.min.js') }}" charset="utf-8">  </script>
  {!! Charts::scripts() !!}
  {!! $chart->script() !!}
  {!! $chart2->script() !!}
@endsection


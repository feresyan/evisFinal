@extends('layouts.executiveLayout')

@section('title','Executive Dashboard')

@section('content')

	<center>
	    <h1 class="cover-heading">Employee Violation Information System</h1>
	    <p class="lead">Selamat Datang {{ Auth::user()->username }} Manager</p>
	</center>	

@endsection
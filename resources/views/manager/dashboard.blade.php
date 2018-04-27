@extends('layouts.managerLayout')

@section('title','Manager Dashboard')

@section('content')

	<center>
	    <h1 class="cover-heading">Employee Violation Information System</h1>
	    <p class="lead">Selamat Datang {{ Auth::user()->username }}</p>
	</center>	

@endsection
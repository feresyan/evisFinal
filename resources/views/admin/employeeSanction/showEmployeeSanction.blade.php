@extends('layouts.adminLayout')

@section('title','Employee Sanction Page')

@section('content')
  <center>
    <h1 class="cover-heading">Employee Sanction Show Page</h1>
  <br>
  <table class="table table-hover table-dark css-serial">
    <thead>
      <tr align="center">
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Violation</th>
        <th scope="col">Sanction</th>
        <th scope="col">Date of Sanction</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr align="center">
        <td></td>
        <td>{{ $hasil->first_name }} {{ $hasil->last_name }}</td>
        <td>{{ $hasil->violation_name }}</td>
        <td>{{ $hasil->sanction_name }}</td>
        <td>{{ $hasil->created_at }}</td>
        <td>{{ $hasil->status }}</td>
        <td>
          <form action="{{ route('employee.sanction.destroy',$hasil->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="fa fa-trash"></button>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  </main>
  </center>
@endsection


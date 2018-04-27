@extends('layouts.adminLayout')

@section('title','Show Employee Violation')

@section('content') 
  <center>
  {{-- @foreach($violation as $data) --}}
    @foreach($employeeViolation->Employee()->get() as $employee)
      <h1 class="cover-heading">Pelanggaran Pegawai</h1>
      <br>
      <table class="table table-hover table-dark css-serial">
        <thead>
          <tr align="center">
            <th scope="col">No</th>
            <th scope="col">nama</th>
            <th scope="col">Pelanggaran</th>
            <th scope="col" >Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr align="center">
            <td></td>
            <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
            @foreach( $violation as $data )
              <td>{{ $data->violation_name }}</td>
            @endforeach
{{--             <td>
              <form action="#">
                <button class="fa fa-pencil"></button>
              </form>
            </td> --}}
            <td>
              <form action="{{ route('employee.violation.destroy',$employeeViolation->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="fa fa-trash"></button>
              </form>
            </td>
          </tr>
        </tbody>
      </table>
      <a href="{{ route('employee.violation.index') }}" class="btn btn-md btn-secondary">Kembali</a>
    @endforeach
  </center>
@endsection
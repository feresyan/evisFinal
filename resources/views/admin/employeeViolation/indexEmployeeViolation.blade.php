@extends('layouts.adminLayout')

@section('title','Employee Violation Index')

@section('content')
  <center>
    <h1 class="cover-heading">Halaman Pelanggaran Pegawai</h1>
  <br>
  <table class="table table-hover table-dark css-serial">
    <thead>
      <tr align="center">
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Pelanggaran</th>
        <th scope="col">Tanggal</th>
      </tr>
    </thead>
    <tbody>
      @foreach($employees as $employee)
        @foreach($employee->employeeViolation()->get() as $employeeViolation)
          <form action="">
            <tr align="center">
              <td></td>
              <td><a href="{{ Route('employee.violation.show',$employeeViolation->id) }}">{{ $employee->first_name }} {{ $employee->last_name }}</a></td>
              @foreach($violationList as $violation)
                @if($employeeViolation->violation_id == $violation->id)
                  <td>{{ $violation->violation_name }}</td>
                @endif
              @endforeach
              <td>{{ $employeeViolation->violation_date }}</td>
            </tr>
          </form>
        @endforeach
      @endforeach
    </tbody>
  </table>
  <br>
  <p class="lead">
    <a href="{{ route('employee.violation.create') }}" class="btn btn-md btn-primary">Tambah Pelanggaran Pegawai</a>
  </p>
  </main>
  </center>
@endsection


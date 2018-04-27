@extends('layouts.adminLayout')

@section('title','Add Employee Violation')

@section('content')
  <main role="main" class="inner cover">
    <center>
      <h1 class="cover-heading">Tambah Pelanggaran Pegawai</h1>
    </center>
    <form action="{{ route('employee.violation.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="departmentId">Departemen</label>
        <select class="form-control departmentId" name="departmentId" required>
          <option value="0" disabled="true" selected="true">-pilih-</option>
          @foreach($departments as $department)
            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
          @endforeach
        </select>
        <br>
        <div class="form-group">
          <label for="employeeName">Nama Pegawai</label>
          <select class="form-control employeeName" name="employeeId" required>
            <option value="0" disabled="true" selected="true">-Nama Pegawai-</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="violation">Pelanggaran</label>
        <select class="form-control" name="violationId" required>
          <option value="0" disabled="true" selected="true">-pelanggaran-</option>
          @foreach($violations as $violation)
            <option value="{{ $violation->id }}">{{ $violation->violation_name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="date">Tanggal Pelanggaran</label>
        <input type="text" name="date" class="form-control" id="date" required>
      </div>
      <input type="submit" class="btn btn-success btn-block" value="Tambah"></input>

    </form>
  </main>
@endsection

@section('script')
  <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('jquery-ui/external/jquery.js') }}"></script>
  <script src="{{ URL::asset('jquery-ui/jquery-ui.min.js') }}"></script>
  
  {{-- datepicker --}}
  <script type="text/javascript">
      $("#date").datepicker();    
  </script>

  <script type="text/javascript">
    $(document).ready(function(){

      $(document).on('change','.departmentId',function(){
          // console.log("hmm..its change");

          var dept_id=$(this).val();
          // console.log(dept_id);

          var div=$(this).parent(); 
          var op =" ";

          $.ajax({
              type:'get',
              url: '{{ route('findEmployeeName') }}',
              data: {'id':dept_id},
              success:function(data){
                  // console.log('success');

                  // console.log(data);

                  // console.log(data.length);
                  op+='<option value="0" selected disabled>-Choose Employee-</option>';
                  for(var i=0; i<data.length; i++){
                    op+='<option value="'+data[i].id+'">'+data[i].first_name+''+" "+''+data[i].last_name+'</option>';
                  }
                  div.find('.employeeName').html(" ");
                  div.find('.employeeName').append(op);
              },
              error:function(){

              }
          });
      });

    });
  </script>
@endsection
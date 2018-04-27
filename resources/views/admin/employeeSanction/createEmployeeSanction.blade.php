@extends('layouts.adminLayout')

@section('title','Add Employee Sanction')

@section('content')
  <main role="main" class="inner cover">
    <center>
      <h1 class="cover-heading">Add New Employee Sanction</h1>
    </center>
    <form action="{{-- {{ route('employee.violation.store') }} --}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="departmentId">Department id</label>
        <select class="form-control departmentId" name="departmentId" required>
          <option value="0" disabled="true" selected="true">-Select-</option>
          @foreach($departments as $department)
            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
          @endforeach
        </select>
        <br>
        <div class="form-group">
          <label for="employeeName">Employee Name</label>
          <select class="form-control employeeName" name="employeeId" required>
            <option value="0" disabled="true" selected="true">-Employee Name-</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="violation">Violation List</label>
        <select class="form-control" name="violationId" required>
          <option value="0" disabled="true" selected="true">-violation-</option>

        </select>
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
{{--   <script type="text/javascript">
      $("#date").datepicker();    
  </script> --}}

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
  @extends('admin.admin_master')

  @section('admin')







  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <div class="container-full">

    <section class="content">
     <div class="row">

      <div class="col-12">

       <div class="box">
        <div class="box-header with-border">
         <h3 class="box-title">Employee Leave List</h3>
         <a href="{{route('add_employees_leave')}}" style="float: right;" class="btn btn-rounded btn-success  mb-5">Add
          Leave</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
         <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
           <thead>
            <tr>
             <th width="5%">SN</th>
             <th>Name</th>
             <th>ID NO</th>
             <th>Purpose</th>
             <th>Start Date</th>
             <th>End Date</th>
             <th>Action</th>
            </tr>
           </thead>
           <tbody>
            @foreach($allData as $key=>$leave)
            <tr>

             <td>{{$key+1}}</td>
             <td>{{$leave->user->name}}</td>
             <td>{{$leave->user->id_no}}</td>
             <td>{{$leave->purpose->leave_purpose}}</td>
             <td>{{date('d-m-Y',strtotime($leave->start_date)) }}</td>
             <td>{{date('d-m-Y',strtotime($leave->end_date)) }}</td>
             <td>

              <a href="{{route('edith_employee_leave',$leave->id)}}" class="btn btn-info btn-sm btn-rounded">EDITH</a>
              <a href="{{route('delete_employee_leave',$leave->id)}}" class="btn btn-danger btn-sm btn-rounded"
               id="delete">DEL</a>
             </td>

            </tr>

            @endforeach
           </tbody>

          </table>
         </div>
        </div>
        <!-- /.box-body -->
       </div>

      </div>
      <!-- /.col -->
     </div>
     <!-- /.row -->
    </section>
    <!-- /.content -->

   </div>
  </div>
  <!-- /.content-wrapper -->






  @endsection
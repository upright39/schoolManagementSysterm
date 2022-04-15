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
         <h3 class="box-title">Employees Salary Details</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
         <h6><strong>Employee Name:</strong> {{$details->name}}</h6>
         <h6><strong>Employee ID NO:</strong> {{$details->id_no}}</h6>
         <h6><strong>Employee Position:</strong> {{$details->designation->name}}</h6>
         <div class="table-responsive">
          <table id="" class="table table-bordered table-striped">
           <thead>
            <tr>
             <th width="5%">SN</th>
             <th width="10%">Previous Salary</th>
             <th width="5%">Increment Salary</th>
             <th width="15%">Present Salary</th>
             <th width="5%">Effected Date</th>

            </tr>
           </thead>
           <tbody>
            @foreach($salaryLogs as $key=>$value)
            <tr>

             <td>{{$key+1}}</td>
             <td>{{$value->previous_salary}}</td>
             <td>{{$value->increment_salary}}</td>
             <td>{{$value->present_salary}}</td>
             <td>{{date('D M Y',strtotime($value->effected_salary))}}</td>
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
  @extends('admin.admin_master')

  @section('admin')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <div class="container-full">



    <section class="content">

     <!-- Basic Forms -->
     <div class="box">
      <div class="box-header with-border">
       <h4 class="box-title">Employee Leave Add</h4>

      </div>
      <!-- /.box-header -->
      <div class="box-body">
       <div class="row">
        <div class="col">
         <form method="post" action="{{route('store_employee_leave')}}">
          @csrf
          <div class="row">

          </div>
          <div class="row">
           <div class="col-6">
            <div class="form-group">
             <h5>Select Employee Name<span class="text-danger">*</span></h5>
             <div class="controls">
              <select name="employee_id" class="form-control">
               <option>Select Eployees name</option>
               @foreach($employees as $employee)
               <option value="{{$employee->id}}">{{$employee->name}}</option>
               @endforeach

              </select>

             </div>
            </div>
           </div>
           <div class="col-6">
            <div class="form-group">
             <h5>Start Date<span class="text-danger">*</span></h5>
             <div class="controls">
              <input type="date" name="start_date" class="form-control">

             </div>

            </div>
           </div>
           <div class="col-6">
            <div class="form-group">
             <h5>Select Leave Purpose<span class="text-danger">*</span></h5>
             <div class="controls">
              <select name="emp_Leave_purpose_id" id="Leave_purpose_id" class="form-control">
               @foreach($Purposes as $Purpose)
               <option value="{{$Purpose->id}}">{{$Purpose->leave_purpose}}</option>
               @endforeach
               <option value="0">New Purpose</option>
              </select>
              <input type="text" id="add_another" name='name' placeholder="Add New Purpose" class="form-control mt-3"
               style="display:none">
             </div>
            </div>
           </div>
           <div class="col-6">
            <div class="form-group">
             <h5>End Date<span class="text-danger">*</span></h5>
             <div class="controls">
              <input type="date" name="end_date" class="form-control">

             </div>

            </div>
           </div>
          </div>

          <div class="text-xs-right">

           <input type="submit" class="btn btn-rounded btn-info" value="Submit">
          </div>
         </form>

        </div>
        <!-- /.col -->
       </div>
       <!-- /.row -->
      </div>
      <!-- /.box-body -->
     </div>
     <!-- /.box -->

    </section>

   </div>
  </div>


  <script type="text/javascript">
$(document).ready(function() {

 $(document).on('change', '#Leave_purpose_id', function() {

  var leave_purpose = $(this).val();
  if (leave_purpose == '0') {
   $('#add_another').show();
  } else {
   $('#add_another').hide();
  }
 })

})
  </script>
  @endsection
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
         <h3 class="box-title">Employees Salary List</h3>
         <a href="{{route('add_employees_reg')}}" style="float: right;" class="btn btn-rounded btn-success  mb-5">Add
          Employee</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
         <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
           <thead>
            <tr>
             <th width="5%">SN</th>
             <th width="10%">Name</th>
             <th width="5%">ID NO</th>
             <th width="15%">Mobile</th>
             <th width="5%">Gender</th>
             <th width="20%">Join Date</th>
             <th width="5%">Salary</th>

             <th width="20%">Action</th>
            </tr>
           </thead>
           <tbody>
            @foreach($Salary as $key=>$value)
            <tr>

             <td>{{$key+1}}</td>
             <td>{{$value->name}}</td>
             <td>{{$value->id_no}}</td>
             <td>{{$value->mobile}}</td>
             <td>{{$value->gender}}</td>
             <td>{{date('D M Y',strtotime($value->join_date))}}</td>
             <td>{{$value->salary}}</td>

             <td>
              <a title="Increase" href="{{route('store_employees_salary',$value->id)}}"
               class="btn btn-info btn-rounded">
               <i class="fa fa-plus-circle"></i></a>
              <a title="Details" href="{{route('employees_salary_log',$value->id)}}"
               class="btn btn-danger  btn-rounded"><i class="fa fa-eye "></i></a>
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
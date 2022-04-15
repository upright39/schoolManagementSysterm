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
         <h3 class="box-title">Employees List</h3>
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
             <th width="5%">Salry</th>
             @if(Auth::user()->role == 'Admin')
             <th width="10%">Code</th>
             @endif
             <th width="25%">Action</th>
            </tr>
           </thead>
           <tbody>
            @foreach($employees as $key=>$employee)
            <tr>

             <td>{{$key+1}}</td>
             <td>{{$employee->name}}</td>
             <td>{{$employee->id_no}}</td>
             <td>{{$employee->mobile}}</td>
             <td>{{$employee->gender}}</td>
             <td>{{$employee->join_date}}</td>
             <td>{{$employee->salary}}</td>
             @if(Auth::user()->role == 'Admin')
             <td>{{$employee->code}}</td>
             @endif
             <td>

              <a href="{{route('edith_employees_reg',$employee->id)}}" class="btn btn-info btn-sm btn-rounded">EDITH</a>
              <a target="_blank" href="{{route('details_employees_reg',$employee->id)}}"
               class="btn btn-danger btn-sm btn-rounded">Detail</a>
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
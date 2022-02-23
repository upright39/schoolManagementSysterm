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
         <h3 class="box-title">Student Year Group</h3>
         <a href="{{route('add.group')}}" style="float: right;" class="btn btn-rounded btn-success  mb-5">Add Group</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
         <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
           <thead>
            <tr>
             <th width="5%">SN</th>
             <th>Class</th>
             <th>Action</th>
            </tr>
           </thead>
           <tbody>
            @foreach($studentGroup as $key=>$group)
            <tr>

             <td>{{$key+1}}</td>
             <td>{{$group->name}}</td>

             <td>

              <a href="{{route('edith.group',$group->id)}}" class="btn btn-info btn-sm btn-rounded">EDITH</a>
              <a href="{{route('delete.group',$group->id)}}" class="btn btn-danger btn-sm btn-rounded"
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
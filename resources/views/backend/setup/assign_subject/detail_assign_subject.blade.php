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
         <h3 class="box-title">Student Assign Subject list</h3>

        </div>
        <!-- /.boview_assign_subjectx-header -->
        <div class="box-body">
         <h4>Class: {{$details['0']->class_function->name}}</h4>
         <div class="table-responsive">
          <table id="" class="table table-bordered table-striped">
           <thead>
            <tr style="background-color:#7a15f7; color:white">
             <th width="5%">SN</th>
             <th>Subject</th>
             <th>Full Mark</th>
             <th>Pass Mark</th>
             <th>Fail Mark</th>

            </tr>
           </thead>
           <tbody>
            @foreach($details as $key=>$data)
            <tr style="color:aliceblue">

             <td>{{$key+1}}</td>
             <td>{{$data->subjectFunction->name}}</td>
             <td>{{$data->full_mark}}</td>
             <td>{{$data->pass_mark}}</td>
             <td>{{$data->fail_mark}}</td>


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
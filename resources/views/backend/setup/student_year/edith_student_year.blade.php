  @extends('admin.admin_master')

  @section('admin')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <div class="container-full">



    <section class="content">

     <!-- Basic Forms -->
     <div class="box">
      <div class="box-header with-border">
       <h4 class="box-title">Edith Student Year</h4>

      </div>
      <!-- /.box-header -->
      <div class="box-body">
       <div class="row">
        <div class="col">
         <form method="post" action="{{route('update.year',$year->id)}}">
          @csrf

          <div class="row">

           <div class="col-10">
            <div class="form-group">
             <h5>update Class Name<span class="text-danger">*</span></h5>
             <div class="controls">
              <input type="text" name="name" class="form-control" value="{{$year->name}}">

             </div>
             @error('name')
             <span class="text-danger">{{$message}}</span>
             @enderror
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

  @endsection
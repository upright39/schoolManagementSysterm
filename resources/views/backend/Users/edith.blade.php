  @extends('admin.admin_master')

  @section('admin')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <div class="container-full">



    <section class="content">

     <!-- Basic Forms -->
     <div class="box">
      <div class="box-header with-border">
       <h4 class="box-title">Edith User</h4>

      </div>
      <!-- /.box-header -->
      <div class="box-body">
       <div class="row">
        <div class="col">
         <form method="post" action="{{route('update.user',$user->id)}}">
          @csrf
          <div class="row">
           <div class="col-6">

            <div class="form-group">
             <h5>Select Role<span class="text-danger"></span></h5>
             <div class="controls">
              <select name="usertype" id="select" class="form-control">

               <option value="user" {{$user->usertype == "user" ?"selected" :''}}>User</option>
               <option value="admin" {{$user->usertype =="admin" ?"selected" :''}}>Admin</option>

              </select>
              <div class="help-block"></div>
             </div>
            </div>
           </div>
           <div class="col-6">
            <div class="form-group">
             <h5>User Email <span class="text-danger"></span></h5>
             <div class="controls">
              <input type="email" name="email" class="form-control" required="" value="{{$user->email}}">
              <div class="help-block"></div>
             </div>

            </div>
           </div>

          </div>
          <div class="row">
           <div class="col-6">
            <div class="form-group">
             <h5>User Name<span class="text-danger"></span></h5>
             <div class="controls">
              <input type="text" name="name" class="form-control" required="" value="{{$user->name}}">
              <div class="help-block"></div>
             </div>
            </div>
           </div>

          </div>

          <div class="text-xs-right">

           <input type="submit" class="btn btn-rounded btn-info" value="Update">
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
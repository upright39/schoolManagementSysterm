  @extends('admin.admin_master')

  @section('admin')
  <!-- jquery ajax cdn -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- end jquery ajax cdn -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <div class="container-full">



    <section class="content">

     <!-- Basic Forms -->
     <div class="box">
      <div class="box-header with-border">
       <h4 class="box-title">Edith Profile</h4>

      </div>
      <!-- /.box-header -->
      <div class="box-body">
       <div class="row">
        <div class="col">
         <form method="post" action="{{route('update.profile')}}" enctype="multipart/form-data">
          @csrf


          <div class="row">
           <div class="col-6">
            <div class="form-group">
             <h5>User Name<span class="text-danger"></span></h5>
             <div class="controls">
              <input type="text" name="name" class="form-control" value="{{$edith->name}}">
              <div class="help-block"></div>
             </div>
            </div>
           </div>


           <div class="col-6">
            <div class="form-group">
             <h5>User Mobile<span class="text-danger"></span></h5>
             <div class="controls">
              <input type="text" name="mobile" class="form-control" required="" value="{{$edith->mobile}}">
              <div class="help-block"></div>
             </div>
            </div>
           </div>
          </div>

          <div class="row">
           <div class="col-6">
            <div class="form-group">
             <h5>User email<span class="text-danger"></span></h5>
             <div class="controls">
              <input type="email" name="email" class="form-control" value="{{$edith->email}}">
              <div class="help-block"></div>
             </div>
            </div>
           </div>
           <div class="col-6">
            <div class="form-group">
             <h5>User Address<span class="text-danger"></span></h5>
             <div class="controls">
              <input type="text" name="address" class="form-control" value="{{$edith->address}}">
              <div class="help-block"></div>
             </div>
            </div>
           </div>

          </div>

          <div class="row">

           <div class="col-6">

            <div class="form-group">
             <h5>User Gender<span class="text-danger"></span></h5>
             <div class="controls">
              <select name="status" id="select" class="form-control">

               <option value="Male" {{$edith->status == "male" ?"selected" :''}}>Male</option>
               <option value="Female" {{$edith->status =="female" ?"selected" :''}}>Female</option>

              </select>
              <div class="help-block"></div>
             </div>
            </div>
           </div>
           <div class="col-6">
            <div class="form-group">
             <h5>Profile Image <span class="text-danger"></span></h5>
             <div class="controls">
              <input type="file" name="image" class="form-control" value="{{$edith->image}}" id="image">
              <div class="help-block"></div>
             </div>

            </div>

            <div class="form-group">
             <div class="controls">
              <img id="showImage"
               src="{{(!empty($user->image))? url('uploads/user_images/'.$user->image):url('uploads/no_image.jpg')}}"
               style="width:100px; height: 100px; border:1px solid #000000;">

             </div>

            </div>


           </div>

          </div>

          <input type="submit" class="btn btn-rounded btn-info" value="Update">
        </div>

        <div class="text-xs-right">


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


  <!-- javascript code for image picking -->

  <script type="text/javascript">
$(document).ready(function() {
 $('#image').change(function(e) {
  var reader = new FileReader();

  reader.onload = function(e) {

   $('#showImage').attr('src', e.target.result)
  }
  reader.readAsDataURL(e.target.files['0']);

 })

});
  </script>

  <!-- end javascript code for image picking -->


  @endsection
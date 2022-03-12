  @extends('admin.admin_master')

  @section('admin')
  <!-- jquery ajax cdn -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- end jquery ajax cdn


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <div class="container-full">



    <section class="content">

     <!-- Basic Forms -->
     <div class="box">
      <div class="box-header with-border">
       <h4 class="box-title">Student Registration</h4>

      </div>
      <!-- /.box-header -->
      <div class="box-body">
       <div class="row">
        <div class="col">
         <form method="post" action="{{route('store_students_reg')}}" enctype="multipart/form-data">
          @csrf
          <div class="row">

          </div>
          <div class="row">

           <div class="col-4">
            <div class="form-group">
             <h5>Student Full Name <span class="text-danger"></span></h5>
             <div class="controls">
              <input type="text" name="name" required="" class="form-control">

             </div>

            </div>
           </div>
           <div class="col-4">
            <div class="form-group">
             <h5>Father's Name OR Guardian<span class="text-danger"></span></h5>
             <div class="controls">
              <input type="text" name="father_name" required="" class="form-control">

             </div>

            </div>
           </div>
           <div class="col-4">
            <div class="form-group">
             <h5>Mother's Name <span class="text-danger"></span></h5>
             <div class="controls">
              <input type="text" name="mother_name" class="form-control">

             </div>

            </div>
           </div>
          </div>
          <div class="row">

           <div class="col-4">
            <div class="form-group">
             <h5>Mobile Number <span class="text-danger"></span></h5>
             <div class="controls">
              <input type="text" name="mobile" required="" class="form-control">

             </div>

            </div>
           </div>
           <div class="col-4">
            <div class="form-group">
             <h5>Address<span class="text-danger"></span></h5>
             <div class="controls">
              <input type="text" name="address" required="" class="form-control">

             </div>

            </div>
           </div>
           <div class="col-4">
            <div class="form-group">
             <h5>Gender <span class="text-danger"></span></h5>

             <select name="gender" required="" class="form-control">
              <option value="" selected="">select Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
             </select>



            </div>
           </div>
          </div>
          <div class="row">

           <div class="col-4">
            <div class="form-group">
             <h5>Religion <span class="text-danger"></span></h5>
             <div class="controls">
              <select name="religion" class="form-control">
               <option value="" selected="">select Religion</option>
               <option value="Christain">Christain</option>
               <option value="Islam">Islam</option>
              </select>
             </div>

            </div>
           </div>
           <div class="col-4">
            <div class="form-group">
             <h5>Date Of Birth <span class="text-danger"></span></h5>
             <div class="controls">
              <input type="date" name="dob" required="" class="form-control">
             </div>
            </div>
           </div>
           <div class="col-4">
            <div class="form-group">
             <h5>Discount<span class="text-danger"></span></h5>
             <div class="controls">
              <input type="text" name="discount" class="form-control">

             </div>

            </div>
           </div>
          </div>
          <div class="row">

           <div class="col-4">
            <div class="form-group">
             <h5>Group <span class="text-danger"></span></h5>
             <div class="controls">
              <select name="student_group_id" required="" class="form-control">
               <option value="" selected="">select Group</option>
               @foreach($Groups as $group)
               <option value="{{$group->id}}">{{$group->name}}</option>
               @endforeach

              </select>

             </div>

            </div>
           </div>
           <div class="col-4">
            <div class="form-group">
             <h5>Add Year <span class="text-danger"></span></h5>
             <div class="controls">
              <select name="student_year_id" required="" class="form-control">
               <option value="" selected="">select Year</option>
               @foreach($Years as $year)
               <option value="{{$year->id}}">{{$year->name}}</option>
               @endforeach

              </select>

             </div>

            </div>
           </div>
           <div class="col-4">
            <div class="form-group">
             <h5>Add Class <span class="text-danger"></span></h5>
             <div class="controls">
              <select name="student_class_id" required="" class="form-control">
               <option value="" selected="">select Class</option>
               @foreach($Classes as $class)
               <option value="{{$class->id}}">{{$class->name}}</option>
               @endforeach

              </select>

             </div>

            </div>
           </div>
          </div>
          <div class="row">

           <div class="col-4">
            <div class="form-group">
             <h5>Shifts <span class="text-danger"></span></h5>
             <div class="controls">
              <select name="student_shift_id" class="form-control">
               <option value="" selected="">select Shift</option>
               @foreach($Shifts as $shift)
               <option value="{{$shift->id}}">{{$shift->name}}</option>
               @endforeach

              </select>

             </div>

            </div>
           </div>
           <div class="col-4">
            <div class="form-group">
             <h5>Profile Image <span class="text-danger"></span></h5>
             <div class="controls">
              <input type="file" name="image" class="form-control" id="image">

             </div>

            </div>
           </div>
           <div class="col-4">
            <div class="form-group">
             <div class="controls">

              <img id="showImage" src="{{url('uploads/no_image.jpg')}}"
               style="width:100px; height: 100px; border:1px solid #000000;">
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
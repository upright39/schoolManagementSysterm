  @extends('admin.admin_master')

  @section('admin')

  <!-- jquery ajax cdn -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- end jquery ajax cdn -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <div class="container-full">

    <section class="content">
     <div class="row">
      <div class="col-12">

       <!-- search section parth -->
       <div class="box bb-3 border-warning">
        <div class="box-header">
         <h4 class="box-title">Student <strong>Roll Generator</strong></h4>
        </div>

        <div class="box-body">

         <form action="{{route('generate_roll_store')}}" method="post">
          @csrf
          <div class="row">
           <div class="col-4">
            <div class="form-group">
             <h5>Add Year <span class="text-danger"></span></h5>
             <div class="controls">
              <select name="student_year_id" id="student_year_id" required="" class="form-control">
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
              <select name="student_class_id" id="student_class_id" required="" class="form-control">
               <option value="" selected="">select Class</option>
               @foreach($Classes as $class)
               <option value="{{$class->id}}">{{$class->name}}
               </option>
               @endforeach

              </select>

             </div>

            </div>
           </div>

           <div class="col-4 " style="padding-top: 25px;">

            <div class="form-group">

             <a id="search" class="btn btn-rounded btn-info mb-5" name="search" type="submit">Search</a>
            </div>
           </div>

          </div>
          <!-- // //////////////////Roll Generate Table///////////////////////// -->


          <div class="row d-none" id="roll-generate">
           <div class="col-md-12">

            <table class="table table-bordered table-striped" style="width: 100%;">
             <thead>
              <tr>
               <th>ID No</th>
               <th>Student Name</th>
               <th>Father Name</th>
               <th>Mother Name</th>
               <th>Gender</th>
               <th>Roll</th>

              </tr>
             </thead>
             <tbody id="roll-generate-tr">


             </tbody>

            </table>



           </div>

          </div>
          <input type="submit" class="btn btn-info" value="Roll generator">

         </form>
        </div>
       </div>
       <!-- end search section parth -->




      </div>
      <!-- /.col -->
     </div>
     <!-- /.row -->
    </section>
    <!-- /.content -->

   </div>
  </div>
  <!-- /.content-wrapper -->


  <!-- // Start Roll Generated =========== -->

  <script type="text/javascript">
$(document).on('click', '#search', function() {
 var year_id = $('#student_year_id').val();
 var class_id = $('#student_class_id').val();
 $.ajax({
  url: "{{ route('student.registration.getstudents')}}",
  type: "GET",
  data: {
   'student_year_id': year_id,
   'student_class_id': class_id
  },
  success: function(data) {
   $('#roll-generate').removeClass('d-none');
   var html = '';
   $.each(data, function(key, v) {
    html +=
     '<tr>' +
     '<td>' + v.student.id_no + '<input type="hidden" name="student_id[]" value="' + v.student_id + '"></td>' +
     '<td>' + v.student.name + '</td>' +
     '<td>' + v.student.father_name + '</td>' +
     '<td>' + v.student.mother_name + '</td>' +
     '<td>' + v.student.gender + '</td>' +
     '<td><input type="text" class="form-control form-control-sm" name="roll[]" value="' + v.roll + '"></td>' +
     '</tr>';
   });
   html = $('#roll-generate-tr').html(html);
  }
 });
});
  </script>

  <!-- ============ End Script Roll Generate ================= -->



  @endsection
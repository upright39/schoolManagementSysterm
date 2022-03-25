  @extends('admin.admin_master')

  @section('admin')

  <!-- jquery ajax cdn -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- end jquery ajax cdn -->

  <!-- handlebars ajax cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>
  <!-- end handlebars  ajax cdn -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <div class="container-full">

    <section class="content">
     <div class="row">
      <div class="col-12">

       <!-- search section parth -->
       <div class="box bb-3 border-warning">
        <div class="box-header">
         <h4 class="box-title">Student <strong>Registration Fee</strong></h4>
        </div>

        <div class="box-body">


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
         <!-- // //////////////////Document Table///////////////////////// -->


         <div class="row">
          <div class="col-md-12">
           <div id="DocumentResults">
            <script id="document-template" type="text/x-handlebars-template">
             <table class = "table table-bordered table-striped" style = "width: 100%;" >
             <thead >
             <tr>

             @{{{thsource}}}
             </tr> 
            </thead> 
            
            
            <tbody >
          @{{#each this}}
         <tr>@{{{tdsource}}}</tr>
         @{{/each}}
             </tbody>

             </table>
           </script>

           </div>


          </div>

         </div>

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


  <!-- ============ Get Registration Fee Method And View Page =================== -->

  <script type="text/javascript">
$(document).on('click', '#search', function() {
 var year_id = $('#student_year_id').val();
 var class_id = $('#student_class_id').val();
 $.ajax({
  url: "{{ route('student.registration.fee.classwise.get')}}",
  type: "get",
  data: {
   'student_year_id': year_id,
   'student_class_id': class_id
  },
  beforeSend: function() {},
  success: function(data) {
   var source = $("#document-template").html();
   var template = Handlebars.compile(source);
   var html = template(data);
   $('#DocumentResults').html(html);
   $('[data-toggle="tooltip"]').tooltip();
  }
 });
});
  </script>

  <!-- ============ End Script Roll Generate ================= -->



  @endsection
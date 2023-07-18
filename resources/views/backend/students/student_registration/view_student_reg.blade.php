  @extends('admin.admin_master')

  @section('admin')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <div class="container-full">

    <section class="content">
     <div class="row">
      <div class="col-12 box bb-3 border-warning">

       <!-- search section parth -->
       <div class="box bb-3 border-warning">
        <div class="box-header">
         <h4 class="box-title">Student <strong>Search</strong></h4>
        </div>

        <div class="box-body">

         <form action="{{route('year_class_search')}}" method="GET">

          <div class="row">
           <div class="col-4">
            <div class="form-group">
             <h5>Add Year <span class="text-danger"></span></h5>
             <div class="controls">
              <select name="student_year_id" required="" class="form-control">
               <option value="" selected="">select Year</option>
               @foreach($Years as $year)
               <option value="{{$year->id}}" {{( @$student_year_id==$year->id)?'selected':''}}>{{$year->name}}</option>
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
               <option value="{{$class->id}}" {{( @$student_class_id == $class->id)?'selected':''}}>{{$class->name}}
               </option>
               @endforeach
              </select>
             </div>

            </div>
           </div>

           <div class="col-4 " style="padding-top: 25px;">

            <div class="form-group">
             <input type="submit" class="btn btn-rounded btn-dark mb-5" value="Search" name="Search">
            </div>
           </div>

          </div>

         </form>
        </div>
       </div>
       <!-- end search section parth -->


       <div class="box">
        <div class="box-header with-border">
         <h3 class="box-title">All Students</h3>
         <a href="{{route('add_students_reg')}}" style="float: right;"
          class="btn btn-rounded btn-success  mb-5">Register
          Student</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body ">
         <div class="table-responsive">

          @if(isset($searchData))
          <table id="example1" class="table table-bordered table-striped">
           <thead>
            <tr>
             <th width="5%">SN</th>
             <th>Name</th>
             <th>ID No</th>
             <th>Roll</th>
             <th>Year</th>
             <th>Class</th>
             <th>Image</th>
             <th>Code</th>
             <th>Edith/ Promote/ Print</th>
            </tr>
           </thead>
           <tbody>
            @foreach($allData as $key=>$value)
            <tr>
             <td>{{$key+1}}</td>
             <td>{{$value->student->name}}</td>
             <td>{{$value->student->id_no}}</td>
             <td>{{$value->roll}}</td>
             <td>{{$value->student_year->name}}</td>
             <td>{{$value->student_class->name}}</td>
             <td>
              <img class="rounded-crcle"
               src="{{(!empty($value->student->image))? url('uploads/students_images/'.$value->student->image):url('uploads/no_image.jpg')}}"
               style="width:70px; height:70px ;border-radius:10px">
             </td>
             <td>
              @if(Auth::User()->role == 'Admin')
              {{$value->student->code}}
              @endif
             </td>
             <td>

              <a title="Edith" href="{{route('edith_students_reg',$value->student_id)}}"
               class="btn btn-info  btn-rounded"><i class="fa fa-edit"></i></a>
              <a title="Promote" href="{{route('promote_students_reg',$value->student_id)}}"
               class="btn btn-primary  btn-rounded"><i class="fa fa-check"></i></a>
              <a target="_blank" title="Print" href="{{route('details_students_reg',$value->student_id)}}"
               class="btn btn-warning  btn-rounded"><i class="fa fa-eye"></i></a>

             </td>

            </tr>

            @endforeach
           </tbody>

          </table>
          @else
          <table id="example1" class="table table-bordered table-striped">
           <thead>
            <tr>
             <th width="5%">SN</th>
             <th>Name</th>
             <th>ID No</th>
             <th>Roll</th>
             <th>Year</th>
             <th>Class</th>
             <th>Image</th>
             <th>Code</th>
             <th>Edith/ Promote/ Print</th>
            </tr>
           </thead>
           <tbody>
            @foreach($allData as $key=>$value)
            <tr>
             <td>{{$key+1}}</td>
             <td>{{$value->student->name}}</td>
             <td>{{$value->student->id_no}}</td>
             <td>{{$value->roll}}</td>
             <td>{{$value->student_year->name}}</td>
             <td>{{$value->student_class->name}}</td>
             <td>
              <img class="rounded-crcle"
               src="{{(!empty($value->student->image))? url('uploads/students_images/'.$value->student->image):url('uploads/no_image.jpg')}}"
               style="width:80px; height:80px ;border-radius:10px">
             </td>
             <td>
              @if(Auth::User()->role == 'Admin')
              {{$value->student->code}}
              @endif
             </td>
             <td>

              <a title="Edith" href="{{route('edith_students_reg',$value->student_id)}}"
               class="btn btn-info  btn-rounded"><i class="fa fa-edit"></i></a>
              <a title="Promote" href="{{route('promote_students_reg',$value->student_id)}}"
               class="btn btn-primary  btn-rounded"><i class="fa fa-check"></i></a>
              <a target="_blank" title="Print" href="{{route('details_students_reg',$value->student_id)}}"
               class="btn btn-warning  btn-rounded"><i class="fa fa-eye"></i></a>
             </td>

            </tr>

            @endforeach
           </tbody>

          </table>
          @endif
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
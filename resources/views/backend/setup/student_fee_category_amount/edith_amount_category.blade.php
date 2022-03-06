  @extends('admin.admin_master')

  @section('admin')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <div class="container-full">



    <section class="content">

     <!-- Basic Forms -->
     <div class="box">
      <div class="box-header with-border">
       <h4 class="box-title">Edith Amount</h4>

      </div>
      <!-- /.box-header -->
      <div class="box-body">
       <div class="row">
        <div class="col">
         <form method="post" action="{{route('update.amount',$edith_amount['0']->student_fee_category_id)}}">
          @csrf
          <div class="add_item">
           <div class="row">
            <div class="col-12">
             <div class="form-group">
              <h5>Edith Category<span class="text-danger">*</span></h5>
              <div class="controls">
               <select name="feecategory_id" class="form-control">
                @foreach($feeCategory as $fee)
                <option value="{{$fee->id}}"
                 {{($edith_amount['0']->student_fee_category_id == $fee->id)?'selected':''}}>{{$fee->name}}</option>
                @endforeach

               </select>

              </div>
             </div>
            </div>
           </div>

           @foreach($edith_amount as $edith )
           <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="row">
             <div class="col-5">
              <div class="form-group">
               <h5>Select Class<span class="text-danger">*</span></h5>
               <div class="controls">
                <select name="class_id[]" class="form-control">
                 @foreach($studentClass as $class)
                 <option value="{{$class->id}}" {{($edith->student_class_id == $class->id)?'selected':''}}>
                  {{$class->name}}
                 </option>
                 @endforeach

                </select>

               </div>
              </div>
             </div>
             <div class="col-5">
              <div class="form-group">
               <h5>Add Amount<span class="text-danger">*</span></h5>
               <div class="controls">
                <input type="text" name="amount[]" class="form-control" value="{{$edith->amount}}">

               </div>

              </div>
             </div>
             <div class="col-2" style="padding-top: 25px;">
              <span class="btn btn-success addeventmore"> <i class="fa fa-plus-circle"></i></span>
              <span class="btn btn-danger removeeventmore"> <i class="fa fa-minus-circle"></i></span>
             </div>
            </div>
           </div>
           @endforeach
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
  <!-- hidden fields section that appears when been click -->
  <div style="visibility: hidden;">
   <div class="whole_extra_item_add" id="whole_extra_item_add">

    <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
     <div class="form-row">

      <div class="col-5">
       <div class="form-group">
        <h5>Edith Class<span class="text-danger">*</span></h5>
        <div class="controls">
         <select name="class_id[]" class="form-control">
          @foreach($studentClass as $class)
          <option value="{{$class->id}}">{{$class->name}}</option>
          @endforeach

         </select>

        </div>
       </div>
      </div>
      <div class="col-5">
       <div class="form-group">
        <h5>Edith Amount<span class="text-danger">*</span></h5>
        <div class="controls">
         <input type="text" name="amount[]" class="form-control">

        </div>

       </div>
      </div>
      <div class="col-2" style="padding-top: 25px;">
       <span class="btn btn-success addeventmore"> <i class="fa fa-plus-circle"></i></span>
       <span class="btn btn-danger removeeventmore"> <i class="fa fa-minus-circle"></i></span>
      </div>

     </div>
    </div>

   </div>
  </div>
  <!-- end hidden section that appears when been click -->

  <!-- javescript hidden section that appears when been click -->
  <script type="text/javascript">
$(document).ready(function() {

 var counter = 0;
 $(document).on("click", ".addeventmore", function() {
  var whole_extra_item_add = $('#whole_extra_item_add').html();
  $(this).closest(".add_item").append(whole_extra_item_add);
  counter++;
 });
 $(document).on("click", '.removeeventmore', function(event) {
  $(this).closest(".delete_whole_extra_item_add").remove();
  counter -= 1
 });

});
  </script>
  <!-- javescript hidden section that appears when been click -->
  @endsection
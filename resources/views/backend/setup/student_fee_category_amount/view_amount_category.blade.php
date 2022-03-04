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
                <h3 class="box-title">Student Fee Amount list</h3>
                <a href="{{route('add.amount')}}" style="float: right;" class="btn btn-rounded btn-success  mb-5">Add
                  Amount</a>
              </div>
              <!-- /.boview_assign_subjectx-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="5%">SN</th>
                        <th>Fee</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($feeAmount as $key=>$amounts)
                      <tr>

                        <td>{{$key+1}}</td>
                        <td>{{$amounts['fee_category']['name'] }}</td>

                        <td>

                          <a href="{{route('edith.amount',$amounts->student_fee_category_id)}}" class="btn btn-info btn-sm btn-rounded">EDITH</a>

                          <a href="{{route('details_amount',$amounts->student_fee_category_id)}}" class="btn btn-primary btn-sm btn-rounded">VIEW DETAILS</a>
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
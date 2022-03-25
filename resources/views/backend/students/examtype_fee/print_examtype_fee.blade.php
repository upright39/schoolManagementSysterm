<!DOCTYPE html>
<html>

<head>
 <style>
 #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
 }

 #customers td,
 #customers th {
  border: 1px solid #ddd;
  padding: 8px;
 }

 #customers tr:nth-child(even) {
  background-color: #f2f2f2;
 }

 #customers tr:hover {
  background-color: #ddd;
 }

 #customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
 }
 </style>
</head>

<body>
 <table id="customers">

  <tr>

   <td>
    <?php
    $image_path = '\uploads\upsman.JPG'; ?>
    <img src=" {{public_path().$image_path}}" alt="image" width="150px" height="100">
   </td>
   <td>
    <h2 style="font-family:sans-serif;font-style:italic">Upsman School ERP</h2>
    <P>School Adress:</P>
    <p>Phone: 09033639712</p>
    <P>Email:upright@gmail.com</P>
    <P><b>Student Exam Fee</b></P>
   </td>
  </tr>

 </table>

 @php
 $registrationfee = App\Models\FeeCategoryAmount::where('student_fee_category_id', '1')->where('student_class_id',
 $details->student_class_id)->first();

 $originalfee = $registrationfee->amount;
 $discount = $details['st_discount_id']['discount'];
 $discounttablefee = $discount / 100 * $originalfee;
 $finalfee = (float)$originalfee - (float)$discounttablefee;
 @endphp

 <table id=" customers">
  <tr>
   <th width="10%">Sl</th>
   <th width="45%">Student Details</th>
   <th width="45%">Student Data</th>
  </tr>

  <tr>
   <td>1</td>
   <td>Student ID Number</td>
   <td>{{$details->student->id_no}}</td>
  </tr>
  <tr>
   <td>2</td>
   <td>Student Role</td>
   <td>{{$details->roll}}</td>

  </tr>
  <tr>
   <td>3</td>
   <td>Student Name</td>
   <td>{{$details->student->name}}</td>

  </tr>
  <tr>
   <td>4</td>
   <td>Fathers Name</td>
   <td>{{$details->student->father_name}}</td>

  </tr>
  <tr>
   <td>5</td>
   <td>Session</td>
   <td>{{$details->student_year->name}}</td>

  </tr>
  <tr>
   <td>6</td>
   <td>Exam Fee</td>
   <td>{{$originalfee}}#</td>

  </tr>


  <tr>
   <td>7</td>
   <td>Discount Fee</td>
   <td>
    {{$discount}}%
   </td>

  </tr>
  <tr>
   <td>8</td>
   <td><b>{{$ExamType}}</b> Fee For this Student</td>
   <td>{{$finalfee}}#</td>
  </tr>

 </table>

 <br>


 <span style="font-style: italic;">print date: {{date('Y M D')}}</span>

 <hr style="border: dashed 10px; margin-bottom:50px; width:95%">

 <table id=" customers">
  <tr>
   <th width="10%">Sl</th>
   <th width="45%">Student Details</th>
   <th width="45%">Student Data</th>
  </tr>

  <tr>
   <td>1</td>
   <td>Student ID Number</td>
   <td>{{$details->student->id_no}}</td>
  </tr>
  <tr>
   <td>2</td>
   <td>Student Role</td>
   <td>{{$details->roll}}</td>

  </tr>
  <tr>
   <td>3</td>
   <td>Student Name</td>
   <td>{{$details->student->name}}</td>

  </tr>
  <tr>
   <td>4</td>
   <td>Fathers Name</td>
   <td>{{$details->student->father_name}}</td>

  </tr>
  <tr>
   <td>5</td>
   <td>Session</td>
   <td>{{$details->student_year->name}}</td>

  </tr>
  <tr>
   <td>6</td>
   <td>Exam Fee</td>
   <td>{{$originalfee}}#</td>

  </tr>


  <tr>
   <td>7</td>
   <td>Discount Fee</td>
   <td>
    {{$discount}}%
   </td>

  </tr>
  <tr>
   <td>8</td>
   <td><b>{{$ExamType}}</b> Fee For this Student</td>
   <td>{{$finalfee}}#</td>
  </tr>

 </table>

 <br>


 <span style="font-style: italic;">print date: {{date('Y M D')}}</span>


</body>

</html>
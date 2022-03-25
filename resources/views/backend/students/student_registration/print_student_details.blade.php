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
    <h2 style="font-family:sans-serif;font-style:italic ">UpsmanTech</h2>
   </td>
   <td>
    <h2 style="font-family:sans-serif;font-style:italic">Upsman School ERP</h2>

    <P>School Adress:</P>
    <p>Phone: 09033639712</p>
    <P>Email:upright@gmail.com</P>
   </td>
  </tr>

 </table>



 <table id=" customers">
  <tr>
   <th width="10%">Sl</th>
   <th width="45%">Student Details</th>
   <th width="45%">Student Data</th>
  </tr>
  <tr>
   <td>1</td>
   <td>Name</td>
   <td>{{$AssignSub->student->name}}</td>
  </tr>
  <tr>
   <td>2</td>
   <td>ID Number</td>
   <td>{{$AssignSub->student->id_no}}</td>
  </tr>
  <tr>
   <td>3</td>
   <td>Student Role</td>
   <td>{{$AssignSub->roll}}</td>

  </tr>
  <tr>
   <td>4</td>
   <td>Fathers Name</td>
   <td>{{$AssignSub->student->father_name}}</td>

  </tr>
  <tr>
   <td>5</td>
   <td>Mother Name</td>
   <td>{{$AssignSub->student->mother_name}}</td>

  </tr>
  <tr>
   <td>6</td>
   <td>Mobile Number</td>
   <td>{{$AssignSub->student->mobile}}</td>

  </tr>
  <tr>
   <td>7</td>
   <td>Adress</td>
   <td>{{$AssignSub->student->address}}</td>

  </tr>
  <tr>
   <td>8</td>
   <td>Gender</td>
   <td>{{$AssignSub->student->gender}}</td>

  </tr>
  <tr>
   <td>9</td>
   <td>Religion</td>
   <td>{{$AssignSub->student-> religion}}</td>

  </tr>
  <tr>
   <td>10</td>
   <td>Date of Birth</td>
   <td>{{$AssignSub->student->dob}}</td>

  </tr>
  <tr>
   <td>11</td>
   <td>Discount</td>
   <td>{{$AssignSub->st_discount_id->discount}}</td>

  </tr>
  <tr>
   <td>12</td>
   <td>Year</td>
   <td>{{$AssignSub->student_year->name}}</td>

  </tr>
  <tr>
   <td>13</td>
   <td>Class</td>
   <td>{{$AssignSub->student_class->name}}</td>

  </tr>
  <tr>
   <td>14</td>
   <td>Group</td>
   <td>{{$AssignSub->student_group->name}}</td>

  </tr>
  <tr>
   <td>15</td>
   <td>Shift</td>

   <td>
    {{$AssignSub->student_shift->name}}
   </td>

  </tr>

 </table>
 <br>


 <span style="font-style: italic;">print date: {{date('Y M D')}}</span>


</body>

</html>
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
    <?php $image_path = '\uploads\upsman.JPG'; ?>
    <img src=" {{public_path().$image_path}}" alt="image" width="150px" height="100">
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
   <th width="45%">Employees Details</th>
   <th width="45%">Employees Registration Page</th>
  </tr>
  <tr>
   <td>1</td>
   <td>Employee Name</td>
   <td>{{$Details->name}}</td>
  </tr>
  <tr>
   <td>2</td>
   <td>Employee ID Number</td>
   <td>{{$Details->id_no}}</td>
  </tr>

  <tr>
   <td>4</td>
   <td>Fathers Name</td>
   <td>{{$Details->father_name}}</td>

  </tr>
  <tr>
   <td>5</td>
   <td>Mother Name</td>
   <td>{{$Details->mother_name}}</td>

  </tr>
  <tr>
   <td>6</td>
   <td>Mobile Number</td>
   <td>{{$Details->mobile}}</td>

  </tr>
  <tr>
   <td>7</td>
   <td>Adress</td>
   <td>{{$Details->address}}</td>

  </tr>
  <tr>
   <td>8</td>
   <td>Gender</td>
   <td>{{$Details->gender}}</td>

  </tr>
  <tr>
   <td>9</td>
   <td>Religion</td>
   <td>{{$Details-> religion}}</td>

  </tr>
  <tr>
   <td>10</td>
   <td>Date of Birth</td>
   <td>{{$Details->dob}}</td>

  </tr>

  <tr>
   <td>13</td>
   <td>Employee Designation</td>
   <td>{{$Details->designation->name}}</td>

  </tr>
  <tr>
   <td>14</td>
   <td>Join Date</td>
   <td>{{ date('Y M D', strtotime($Details->join_date))}}</td>

  </tr>
  <tr>
   <td>15</td>
   <td>Employee Salary</td>

   <td>
    {{$Details->salary}}
   </td>

  </tr>

 </table>
 <br>


 <span style="font-style: italic;">print date: {{date('D M Y')}}</span>


</body>

</html>
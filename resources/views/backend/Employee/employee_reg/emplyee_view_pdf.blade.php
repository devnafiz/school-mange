<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

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

<h1>A Fancy Table</h1>

<table id="customers" >
  <tr>
    <td>School Software</td>
    <td><h2>School ErP</h2>

     <p>Address: dhaka ,bangladesh</p>
     <p>Mobile No: 02823734748</p>

     <p><p>Email:hassn@gamil.com</p></p>

     <p><p>Employee details</p></p>
    </td>
    
  </tr>
  
  
</table>

<table id="customers">
  <tr>
    <th width="10%">SL</th>
    <th width="45%">Student detail</th>
    <th width="45%">student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Employee Name:</b></td>
    <td>{{$details->name}}</td>
  </tr>

  <tr>
    <td>2</td>
    <td><b>Father Name:</b></td>
    <td>{{$details->fname}}</td>
  </tr>
  <tr>
    <td>3</td>
    <td><b>Mother Name:</b></td>
    <td>{{$details->mname}}</td>
  </tr>
  <tr>
    <td>4</td>
    <td><b>Mobile No</b></td>
    <td>{{$details->mobile}}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Address</b></td>
    <td>{{$details->address}}</td>
  </tr>
   <tr>
    <td>6</td>
    <td><b>Religion</b></td>
    <td>{{ $details->religion }}</td>
  </tr>


    <tr>
    <td>7</td>
    <td><b>Date of Birth</b></td>
    <td>{{date('d-m-Y',strtotime($details->dob))  }}</td>
  </tr>
    <tr>
    <td>8</td>
    <td><b>Designation </b></td>
    <td>{{ $details['designation']['name'] }} </td>
  </tr>

  <tr>
    <td>9</td>
    <td><b>Gender </b></td>
    <td>{{ $details->gender }} </td>
  </tr>

   <tr>
    <td>10</td>
    <td><b>Salary </b></td>
    <td>{{ $details->salary }} </td>
  </tr>
   
  
</table>

</body>
</html>

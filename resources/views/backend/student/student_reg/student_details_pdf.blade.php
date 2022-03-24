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
    <td><b>Student Name:</b></td>
    <td>{{$details['student']['name']}}</td>
  </tr>

  <tr>
    <td>1</td>
    <td><b>Father Name:</b></td>
    <td>{{$details['student']['fname']}}</td>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Mother Name:</b></td>
    <td>{{$details['student']['mname']}}</td>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Mobile No</b></td>
    <td>{{$details['student']['mobile']}}</td>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Address</b></td>
    <td>{{$details['student']['address']}}</td>
  </tr>
   <tr>
    <td>9</td>
    <td><b>Religion</b></td>
    <td>{{ $details['student']['religion'] }}</td>
  </tr>


    <tr>
    <td>10</td>
    <td><b>Date of Birth</b></td>
    <td>{{ $details['student']['dob'] }}</td>
  </tr>
    <tr>
    <td>11</td>
    <td><b>Discount </b></td>
    <td>{{ $details['discount']['discount'] }} %</td>
  </tr>
    <tr>
    <td>12</td>
    <td><b>Year </b></td>
    <td>{{ $details['student_year']['name'] }}</td>
  </tr>
    <tr>
    <td>13</td>
    <td><b>Class  </b></td>
    <td>{{ $details['student_class']['name'] }}</td>
  </tr>
    <tr>
    <td>14</td>
    <td><b>Group </b></td>
    <td>{{ $details['group']['name'] }}</td>
  </tr>
    <tr>
    <td>15</td>
    <td><b>Shift </b></td>
    <td>{{ $details['shift']['name'] }}</td>
  </tr>
  
</table>

</body>
</html>

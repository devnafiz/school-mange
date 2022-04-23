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

<table id="customers">
  <tr>
    <td><h2>
  <?php $image_path = '/upload/easyschool.png'; ?>
  <img src="{{ public_path() . $image_path }}" width="200" height="100">

    </h2></td>
    <td><h2>Easy School ERP</h2>
<p>School Address</p>
<p>Phone : 343434343434</p>
<p>Email : support@easylerningbd.com</p>
<p> <b> Monthly Profit</b> </p>

    </td> 
  </tr>
  
   
</table>

@php 

            $student_fee =App\Models\AccountStudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');

            $other_cost = App\Models\AccountOtherCost::whereBetween('date',[$sdate,$edate])->sum('amount');

             $employees_salary = App\Models\AccountSalary::whereBetween('date',[$start_date,$end_date])->sum('amount');
        $totalCost=$other_cost +$employees_salary;
        $profit = $student_fee- $student_fee;
@endphp 

<table id="customers">
  <tr>
    <td colspan="2" style="text-align:center;">
      
      <h4>Reporting Date:{{date('d M Y',strtotime($sdate))}}-{{date('d M Y',strtotime($edate))}}</h4>
    </td>
  </tr>
  <tr>
    <td width="50%"><h4>Purpose</h4></td>
    <td width="50%"><b><h4>Amount</h4></b></td>
    
  </tr>
  <tr>
    <td>Student Fee</td>
    <td><b>{{$student_fee}}</b></td>
    
  </tr>

    <tr>
    <td>Employee Salary</td>
    <td><b>{{ $employees_salary }}</b></td>
    
  </tr>

  <tr>
    <td>Other Cost</td>
    <td><b>{{ $other_cost }}</b></td>
    
  </tr>
  <tr>
   
    <td><b>Total Cost</b></td>
     <td>{{$totalCost}}</td>
   
  </tr>
   <tr>
   
    <td><b>Profit</b></td>
     <td>{{$profit}}</td>
   
  </tr>
 
 
    
   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>



</body>
</html>

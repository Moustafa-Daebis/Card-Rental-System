<html>
    <head>
        <style type="text/css">
            th, td {
             color: aliceblue;
             font-family: 'Courier New', Courier, monospace;
            }
            .button {
        background-color: #ffffff;
        border: none;
        color: rgb(0, 0, 0);
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 8px;
      }
      .select-selected:after {
  position: center;
  content: "car status";
  top: 14px;
  right: 10px;
 
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}
      
            
            input{
                position: center;
             border:1px solid rgb(255, 255, 255);
             border-radius:5px;
            }
            h1{
             color:rgb(255, 255, 255);
             font-size:44px;
             text-align:center;
             font-family: 'Courier New', Courier, monospace;
            }
            
            body {
background-image: url('2022-S-MAYBACH-GAL-008-D-FE-DR.jpg');
background-size: 100% 100%;
backdrop-filter: blur(10px);
}
           </style>

    </head>
<body>



<?php
session_start();
$E_mail=$_SESSION['E_mail']; 
$res_id=$_SESSION['res_id']; 


$name=$_SESSION['name']; 
$country=$_SESSION['country'];
$city=$_SESSION['city'];
$address=$_SESSION['address']; 
$gender=$_SESSION['gender']; 
$plate_id=$_SESSION['plate_id']; 
$brand=$_SESSION['brand'];
$color=$_SESSION['color'];
$model=$_SESSION['model'];
$year=$_SESSION['year'];
$day=$_SESSION['day'];
$conn=new mysqli("localhost","root","","fproject");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$flag=0;
$queryleft="select * from customer left outer join reservation on customer.E_mail=reservation.E_mail left outer join car on reservation.plate_id=car.plate_id";
$queryright="select * from customer right outer join reservation on customer.E_mail=reservation.E_mail right outer join car on reservation.plate_id=car.plate_id";
if(!empty($E_mail)){
  if ($flag==0){
    $queryleft=$queryleft." where customer.E_mail ='".$E_mail."'";
    $queryright=$queryright." where customer.E_mail ='".$E_mail."'";
    $flag=1;
  }
  else{
    $queryleft=$queryleft." and customer.E_mail ='".$E_mail."'";
    $queryright=$queryright." and customer.E_mail ='".$E_mail."'";
  }
}
if(!empty($name)){
  if ($flag==0){
    $queryleft=$queryleft." where name ='".$name."'";
    $queryright=$queryright." where name ='".$name."'";
    $flag=1;
  }
  else{
    $queryleft=$queryleft." and name ='".$name."'";
    $queryright=$queryright." and name ='".$name."'";
  }
}
if(!empty($country)){
  if ($flag==0){
    $queryleft=$queryleft." where country ='".$country."'";
    $queryright=$queryright." where country ='".$country."'";
    $flag=1;
  }
  else{
    $queryleft=$queryleft." and country ='".$country."'";
    $queryright=$queryright." and country ='".$country."'";
  }
}
if(!empty($city)){
  if ($flag==0){
    $queryleft=$queryleft." where city ='".$city."'";
    $queryright=$queryright." where city ='".$city."'";
    $flag=1;
  }
  else{
    $queryleft=$queryleft." and city ='".$city."'";
    $queryright=$queryright." and city ='".$city."'";
  }
}
if(!empty($address)){
  if ($flag==0){
    $queryleft=$queryleft." where address ='".$address."'";
    $queryright=$queryright." where address ='".$address."'";
    $flag=1;
  }
  else{
    $queryleft=$queryleft." and address ='".$address."'";
    $queryright=$queryright." and address ='".$address."'";
  }
}
if(!empty($gender)){
  if ($flag==0){
    $queryleft=$queryleft." where gender ='".$gender."'";
    $queryright=$queryright." where gender ='".$gender."'";
    $flag=1;
  }
  else{
    $queryleft=$queryleft." and gender ='".$gender."'";
    $queryright=$queryright." and gender ='".$gender."'";
  }
}
if(!empty($plate_id)){
  if ($flag==0){
    $queryleft=$queryleft." where plate_id ='".$plate_id."'";
    $queryright=$queryright." where plate_id ='".$plate_id."'";
    $flag=1;
  }
  else{
    $queryleft=$queryleft." and plate_id ='".$plate_id."'";
    $queryright=$queryright." and plate_id ='".$plate_id."'";
  }
}
if(!empty($brand)){
  if ($flag==0){
    $queryleft=$queryleft." where brand ='".$brand."'";
    $queryright=$queryright." where brand ='".$brand."'";
    $flag=1;
  }
  else{
    $queryleft=$queryleft." and brand ='".$brand."'";
    $queryright=$queryright." and brand ='".$brand."'";
  }
}
if(!empty($color)){
  if ($flag==0){
    $queryleft=$queryleft." where color ='".$color."'";
    $queryright=$queryright." where color ='".$color."'";
    $flag=1;
  }
  else{
    $queryleft=$queryleft." and color ='".$color."'";
    $queryright=$queryright." and color ='".$color."'";
  }
}
if(!empty($model)){
  if ($flag==0){
    $queryleft=$queryleft." where model ='".$model."'";
    $queryright=$queryright." where model ='".$model."'";
    $flag=1;
  }
  else{
    $queryleft=$queryleft." and model ='".$model."'";
    $queryright=$queryright." and model ='".$model."'";
  }
}
if(!empty($year)){
  if ($flag==0){
    $queryleft=$queryleft." where year ='".$year."'";
    $queryright=$queryright." where year ='".$year."'";
    $flag=1;
  }
  else{
    $queryleft=$queryleft." and year ='".$year."'";
    $queryright=$queryright." and year ='".$year."'";
  }
}
if(!empty($day)){
  if ($flag==0){
    $queryleft=$queryleft." where res_date ='".$day."'";
    $queryright=$queryright." where res_date ='".$day."'";
    $flag=1;
  }
  else{
    $queryleft=$queryleft." and res_date ='".$day."'";
    $queryright=$queryright." and res_date ='".$day."'";
  }
}
if(!empty($res_id)){
  if ($flag==0){
    $queryleft=$queryleft." where res_id ='".$res_id."'";
    $queryright=$queryright." where res_id ='".$res_id."'";
    $flag=1;
  }
  else{
    $queryleft=$queryleft." and res_id ='".$res_id."'";
    $queryright=$queryright." and res_id ='".$res_id."'";
  }
}
$query=$queryleft." UNION ".$queryright;
$result = mysqli_query($conn, $query);
?>
<h1>Advanced information</h1>
<table border ="1" cellspacing="0" cellpadding="10" align="center">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>country</th>
    <th>city</th>
    <th>phone</th>
    <th>address</th>
    <th>gender</th>
    <th>Reservation ID</th>
    <th>Office ID</th>
    <th>Start date</th>
    <th>End date</th>
    <th>Payment</th>
    <th>Paid</th>
    <th>Paid Date</th>
    <th>Plate ID</th>
    <th>Car brand</th>
    <th>model</th>
    <th>year</th>
    <th>price_per_day</th>
    <th>color</th>
  </tr>
<?php
if (mysqli_num_rows($result) > 0) {
    while($data = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
        <td><?php echo $data['name']; ?> </td>
        <td><?php echo $data['E_mail']; ?> </td>
        <td><?php echo $data['country']; ?> </td>
        <td><?php echo $data['city']; ?> </td>
        <td><?php echo $data['phone']; ?> </td>
        <td><?php echo $data['address']; ?> </td>
        <td><?php echo $data['gender']; ?> </td>
        <td><?php echo $data['res_id']; ?> </td>
        <td><?php echo $data['office_id']; ?> </td>
        <td><?php echo $data['from']; ?> </td>
        <td><?php echo $data['to']; ?> </td>
        <td><?php echo $data['payment']; ?> </td>
        <td><?php echo $data['paid']; ?> </td>
        <td><?php echo $data['paid_date']; ?> </td>
        <td><?php echo $data['plate_id']; ?> </td>
        <td><?php echo $data['brand']; ?> </td>
        <td><?php echo $data['model']; ?> </td>
        <td><?php echo $data['year']; ?> </td>
        <td><?php echo $data['price_per_day']; ?> </td>
        <td><?php echo $data['color']; ?> </td>

        <?php
    
    ?>
  
        <?php 
    }
}
?>
  </table>
  
  <button class="button"  onclick="window.location.href='http://localhost/finalproject_car/admin/adminsearchhub.php'">
      Back
  </button>
</body>
</html>
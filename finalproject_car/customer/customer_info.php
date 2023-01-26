
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


<body>


<?php
session_start();
$conn=new mysqli("localhost","root","","fproject");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query="select * from customer where E_mail='".$_SESSION['E_mail']."'";
$query2="select * from reservation where E_mail='".$_SESSION['E_mail']."'";
$query3="select c.plate_id,c.brand,c.model,c.year,c.price_per_day,c.color from car as c Join reservation as r on r.plate_id=c.plate_id where r.E_mail='".$_SESSION['E_mail']."'";
$query4="select count(res_id) from reservation as r where r.E_mail='".$_SESSION['E_mail']."'";

$result = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query2);
$result3= mysqli_query($conn, $query3);
$result4= mysqli_query($conn, $query4);


?>
<h1>Customer information</h1>
<table border ="1" cellspacing="0" cellpadding="10" align=center>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>country</th>
    <th>city</th>
    <th>phone</th>
    <th>address</th>
    <th>gender</th>
    <th>reservations no.</th>
  </tr>
<?php
if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $data2 = mysqli_fetch_assoc($result4);
        ?>
        <tr>
        <td><?php echo $data['name']; ?> </td>
        <td><?php echo $data['E_mail']; ?> </td>
        <td><?php echo $data['country']; ?> </td>
        <td><?php echo $data['city']; ?> </td>
        <td><?php echo $data['phone']; ?> </td>
        <td><?php echo $data['address']; ?> </td>
        <td><?php echo $data['gender']; ?> </td>
        <td><?php echo $data2['count(res_id)']; ?> </td>
        <?php
    }
    ?>
  </table>
    <h1>Customer Resveration information</h1>
    <table border ="1" cellspacing="0" cellpadding="10" align=center>
    <tr>
    <th>Reservation ID</th>
    <th>Email</th>
    <th>Office ID</th>
    <th>Plate ID</th>
    <th>Start date</th>
    <th>End date</th>
    <th>reservation date</th>
    <th>Payment</th>
    <th>Paid</th>
    <th>Paid Date</th>
    <th>pay</th>


  </tr>
  <?php
  $res_ids=array();
  $sn=0;
if (mysqli_num_rows($result2) > 0) {
  while($data = mysqli_fetch_assoc($result2)){ 
    
    $res_ids[$sn]=$data['res_id'];
        ?>
        <tr>
        <td><?php echo $data['res_id']; ?> </td>
        <td><?php echo $data['E_mail']; ?> </td>
        <td><?php echo $data['office_id']; ?> </td>
        <td><?php echo $data['plate_id']; ?> </td>
        <td><?php echo $data['from']; ?> </td>
        <td><?php echo $data['to']; ?> </td>
        <td><?php echo $data['res_date']; ?> </td>
        <td><?php echo $data['payment']; ?> </td>
        <td><?php echo $data['paid']; ?> </td>
        <td><?php echo $data['paid_date']; ?> </td>
        <form  method="post" action="">
   <td> <input type="submit" name="<?php echo $sn; ?>" value="pay now" > </td>
   
  </form>
 <tr>
        
        <?php
          $sn++;
    }
  }
  for ($x = 0; $x <= $sn; $x++) {
    if(isset($_POST[$x])){
      $query="select paid from reservation where res_id='".$res_ids[$x]."'";
      $result12 = mysqli_query($conn, $query);
      $meow = mysqli_fetch_assoc($result12);
      $ressss=$meow['paid'];
      if ($ressss=='NO'){
        $query55="update reservation set paid='YES'  where res_id='".$res_ids[$x]."'";
        $query66="update reservation set paid_date=CURRENT_DATE()  where res_id='".$res_ids[$x]."'";
        mysqli_query($conn, $query66);
         mysqli_query($conn, $query55);
         echo "<script type='text/javascript'>;location='http://localhost/finalproject_car/customer/customer_info.php';</script></script>";

      }

   
   }

  }
    ?>
  </table>
  <h1>Reserved Car Information</h1>
    <table border ="1" cellspacing="0" cellpadding="10" align=center>
    <tr>
    <th>Plate ID</th>
    <th>Car brand</th>
    <th>model</th>
    <th>year</th>
    <th>price_per_day</th>
    <th>color</th>
  </tr>
  <?php
  if (mysqli_num_rows($result3) > 0) {
    
    while($data = mysqli_fetch_assoc($result3)) {
     
    ?>
    <tr>
        <td><?php echo $data['plate_id']; ?> </td>
        <td><?php echo $data['brand']; ?> </td>
        <td><?php echo $data['model']; ?> </td>
        <td><?php echo $data['year']; ?> </td>
        <td><?php echo $data['price_per_day']; ?> </td>
        <td><?php echo $data['color']; ?> </td>
    <tr>
        <?php 
    }
}
?>
  </table>
  
  <button class="button"  onclick="window.location.href='http://localhost/finalproject_car/customer/customer.php'">
      Back
  </button>
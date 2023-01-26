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
$office_id=$_SESSION['office_id'];
$E_mail=$_SESSION['E_mail'];
$brand = $_SESSION['brand'];
$color = $_SESSION['color'];
$year = $_SESSION['year'];
$model = $_SESSION['model'];
$from = $_SESSION['from'];
$to = $_SESSION['to'];
$paid = $_SESSION['paid'];
$conn=new mysqli("localhost","root","","fproject");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$query="";
if(!empty($brand)){
  $query1 = "SELECT c.brand,c.color,c.model,c.year,c.plate_id,c.price_per_day FROM car as c NATURAL JOIN office where c.plate_id not in   (SELECT  r.plate_id FROM reservation as r ) and office_id='".$office_id."' and brand='".$brand."' UNION  SELECT c.brand,c.color,c.model,c.year,c.plate_id,c.price_per_day FROM car as c NATURAL JOIN office where c.plate_id  in  (SELECT  r.plate_id FROM reservation as r where r.`to` < '".$from."') and office_id =
  '".$office_id."' and brand='".$brand."'";
  if($query==""){
    $query=$query1;
  }
  else
      $query=$query." intersect ".$query1;
}
if(!empty($color)){
    $query2 = "SELECT c.brand,c.color,c.model,c.year,c.plate_id,c.price_per_day FROM car as c NATURAL JOIN office where c.plate_id not in   (SELECT  r.plate_id FROM reservation as r ) and office_id='".$office_id."' and color='".$color."' UNION  SELECT c.brand,c.color,c.model,c.year,c.plate_id,c.price_per_day FROM car as c NATURAL JOIN office where c.plate_id  in  (SELECT  r.plate_id FROM reservation as r where r.`to` < '".$from."') and office_id =
    '".$office_id."' and color='".$color."'";
    if($query==""){
      $query=$query2;
    }
    else
        $query=$query." intersect ".$query2;
}
if(!empty($year)){
  $query3 = "SELECT c.brand,c.color,c.model,c.year,c.plate_id,c.price_per_day FROM car as c NATURAL JOIN office where c.plate_id not in   (SELECT  r.plate_id FROM reservation as r ) and office_id='".$office_id."' and year='".$year."' UNION  SELECT c.brand,c.color,c.model,c.year,c.plate_id,c.price_per_day FROM car as c NATURAL JOIN office where c.plate_id  in  (SELECT  r.plate_id FROM reservation as r where r.`to` < '".$from."') and office_id =
  '".$office_id."' and year='".$year."'";
  if($query==""){
    $query=$query3;
  }
  else
      $query=$query." intersect ".$query3;
}
if(!empty($model)){
  $query4 = "SELECT c.brand,c.color,c.model,c.year,c.plate_id,c.price_per_day FROM car as c NATURAL JOIN office where c.plate_id not in   (SELECT  r.plate_id FROM reservation as r ) and office_id='".$office_id."' and model='".$model."' UNION  SELECT c.brand,c.color,c.model,c.year,c.plate_id,c.price_per_day FROM car as c NATURAL JOIN office where c.plate_id  in  (SELECT  r.plate_id FROM reservation as r where r.`to` < '".$from."') and office_id =
  '".$office_id."' and model='".$model."'";
  if($query==""){
    $query=$query4;
  }
  else
      $query=$query." intersect ".$query4;
}

$result = mysqli_query($conn, $query);
?>
<br>
<br>

 <h1> Available cars </h1>

<br>
<br>
<br>
<br>
<br>
<br>

<table border ="1" cellspacing="0" cellpadding="10" align=center>
  <tr>
    <th>S.N</th>
    <th>Car brand</th>
    <th>model</th>
    <th>year</th>
    <th>price_per_day</th>
    <th>color</th>
    <th>Reserve</th>
  </tr>
<?php
$plates=array();
if (mysqli_num_rows($result) > 0) {
  $sn=1;

  while($data = mysqli_fetch_assoc($result)) {
  $plates[$sn]=$data['plate_id'];
  
 ?>
 <tr>
   <td><?php echo $sn; ?> </td>
   <td><?php echo $data['brand']; ?> </td>
   <td><?php echo $data['model']; ?> </td>
   <td><?php echo $data['year']; ?> </td>
   <td><?php echo $data['price_per_day']; ?> </td>
   <td><?php echo $data['color']; ?> </td>
   <form  method="post" action="">
   <td> <input type="submit" name="<?php echo $sn; ?>" value="<?php echo $data['plate_id']; ?>" > </td>
  </form>
 <tr>
  
 <?php
 
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No cars Available</td>
    </tr>
 <?php } ?>
 </table>
 <?php
 
 for ($x = 0; $x <= $sn; $x++) {
  if(isset($_POST[$x])){
  $query5="SELECT DATEDIFF('".$to."','".$from."')*c.price_per_day as ppp from car as c where plate_id='".$plates[$x]."'";
  $resulttt=mysqli_query($conn, $query5);
  $payy=mysqli_fetch_assoc($resulttt);
  $payy=$payy['ppp'];
  $query="INSERT INTO reservation (E_mail, plate_id, office_id,`from`,`to`,paid,payment) VALUES ('$E_mail', '$plates[$x]','$office_id','$from','$to','$paid','$payy')" or die(mysqli_error($conn));
  $query2="update reservation 
  set paid_date = res_date
  where paid='YES'" or die(mysqli_error($conn));

  mysqli_query($conn, $query);
  mysqli_query($conn, $query2);


  
  echo "<script type='text/javascript'>alert('Car is reserved successfully');location='http://localhost/finalproject_car/customer/customer.php';</script></script>";
 }
 
}
?>
 <br>
 <br>
 <div class="center1">
 <button class="button"  onclick="window.location.href='http://localhost/finalproject_car/customer/reservation.php'">
      Back
  </button>
  </div>
  </body>
  </html>

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
$from=$_SESSION['from'];
$to=$_SESSION['to'] ;
$plate_id=$_SESSION['plate_id'];

$conn=new mysqli("localhost","root","","fproject");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query="select r.res_id,r.E_mail,r.plate_id,c.brand,c.model,c.year,r.paid,c.color,r.from,r.to
 from reservation as r 
 join car as c on r.plate_id=c.plate_id
 where r.plate_id=('".$plate_id."') and 
r.res_date  between ('".$from."') and ('".$to."');";

 


$result = mysqli_query($conn, $query);
?>
<br>
<br>
<br>

<br>
<br>
<br>
<br>
<h1>All reservations of any car within a specified period</h1>
<table border ="1" cellspacing="0" cellpadding="10" align=center>
  <tr>
    
    <th>Reservation ID</th>
    <th>Email</th>
    <th>Plate ID</th>
    <th>brand</th>
    <th>model</th>
    <th>year</th>
    <th>color</th>
    <th>start date</th>
    <th>End date</th>
    <th>paid</th>
    
    
  </tr>
<?php
if (mysqli_num_rows($result) > 0) {
    while($data = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
        <td><?php echo $data['res_id']; ?> </td>
        <td><?php echo $data['E_mail']; ?> </td>
        <td><?php echo $data['plate_id']; ?> </td>
        <td><?php echo $data['brand']; ?> </td>
        <td><?php echo $data['model']; ?> </td>
        <td><?php echo $data['year']; ?> </td>
        <td><?php echo $data['color']; ?> </td>
        <td><?php echo $data['from']; ?> </td>
        <td><?php echo $data['to']; ?> </td>
        <td><?php echo $data['paid']; ?> </td>
        <?php
    
    ?>
  
        <?php 
    }
}
?>
  </table>
  
  <button class="button"  onclick="window.location.href='http://localhost/finalproject_car/admin/information/info2.php'">
      Back
  </button>
</body>
</html>
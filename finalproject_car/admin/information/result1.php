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
$conn=new mysqli("localhost","root","","fproject");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query="select cr.plate_id, cr.brand, cr.model, cr.color,c.name, c.E_mail, c.phone, r.paid,r.office_id,r.res_id,r.from,r.to,r.payment,r.paid_date,r.res_date
from reservation as r
join car as cr on r.plate_id=cr.plate_id
join customer as c on r.E_mail=c.E_mail
where res_date between ('".$from."')and('".$to."')";
$result = mysqli_query($conn, $query);
?>
<br>
<br>
<br>
<br>
<br>

<h1>All reservations within a specified period</h1>
<table border ="1" cellspacing="0" cellpadding="10" align=center>
  <tr>
    
    <th>Reservation ID</th>
    <th>Plate ID</th>
    <th>Email</th>
    <th>Office ID</th>
    <th>Start date</th>
    <th>End date</th>
    <th>Payment</th>
    <th>Paid</th>
    <th>Paid Date</th>
    <th>res date</th>
  </tr>
<?php
if (mysqli_num_rows($result) > 0) {
    while($data = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
        <td><?php echo $data['res_id']; ?> </td>
        <td><?php echo $data['plate_id']; ?> </td>
        <td><?php echo $data['E_mail']; ?> </td>
        <td><?php echo $data['office_id']; ?> </td>
        <td><?php echo $data['from']; ?> </td>
        <td><?php echo $data['to']; ?> </td>
        <td><?php echo $data['payment']; ?> </td>
        <td><?php echo $data['paid']; ?> </td>
        <td><?php echo $data['paid_date']; ?> </td>
        <td><?php echo $data['res_date']; ?> </td>
        <?php
    
    ?>
  
        <?php 
    }
}
?>
  </table>
  
  <button class="button"  onclick="window.location.href='http://localhost/finalproject_car/admin/information/info1.php'">
      Back
  </button>
</body>
</html>
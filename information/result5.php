<?php
session_start();
$from=$_SESSION['from'];
$to=$_SESSION['to'] ;
$conn=new mysqli("localhost","root","","fproject");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query="select * from customer left outer join reservation on customer.E_mail=reservation.E_mail   left outer join car on reservation.plate_id=car.plate_id  UNION select * from customer right outer join reservation on customer.E_mail=reservation.E_mail   right outer join car on reservation.plate_id=car.plate_id ;";
$result = mysqli_query($conn, $query);
?>
<th>Daily payments within specific period</th>
<table border ="1" cellspacing="0" cellpadding="10">
  <tr>
    <th>Payment</th>
  </tr>
<?php
if (mysqli_num_rows($result) > 0) {
    while($data = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
        
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
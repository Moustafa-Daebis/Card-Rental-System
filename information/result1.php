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
<th>All reservations within a specified period</th>
<table border ="1" cellspacing="0" cellpadding="10">
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
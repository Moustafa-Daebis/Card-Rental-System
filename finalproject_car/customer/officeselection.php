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
$query="Select office_id,country,city from office";
$result = mysqli_query($conn, $query);

?>
<div class = container>
        </div>
        <br>
        <br>
        <h1> Please select an office</h1>
        <br>
        <br>
        <br>
        <br>
</div>
<table cellspacing="0" border ="1"  cellpadding="10" align='center'>
  <tr>
    <th>N</th>
    <th>Office_ID</th>
    <th>Country</th>
    <th>City</th>
    <th>Select</th>
  </tr>
<?php
$offices=array();
if (mysqli_num_rows($result) > 0) {
  $sn=1;

  while($data = mysqli_fetch_assoc($result)) {
  $offices[$sn]=$data['office_id'];
  
 ?>
 <tr>
   <td><?php echo $sn; ?> </td>
   <td><?php echo $data['office_id']; ?> </td>
   <td><?php echo $data['country']; ?> </td>
   <td><?php echo $data['city']; ?> </td>
   <form  method="post" action="">
   <td> <input type="submit" name="<?php echo $sn; ?>" value="<?php echo $data['office_id']; ?>" > </td>
  </form>
 <tr>
 
 <?php
 for ($x = 0; $x <= $sn; $x++) {
  if(isset($_POST[$x])){
  $_SESSION['office_id']=$offices[$x];
  echo "<script type='text/javascript'>;location='http://localhost/finalproject_car/customer/reservation.php';</script></script>";
 }
}
  $sn++;}}
   else { ?>
    <tr>
     <td colspan="8">No offices Available</td>
    </tr>
 <?php } ?>
   </table>

   <div class = .button>
   <input type='button' name='back' id="back" value='back' onclick="window.location.href='http://localhost/finalproject_car/customer/customer.php'"/>
   </div>
    </body>

</html>

      
 
 
   </body>
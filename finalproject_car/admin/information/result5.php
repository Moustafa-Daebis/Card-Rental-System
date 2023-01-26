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
  $query="select sum(payment),r.res_date
  from reservation as r 
  where r.res_date between ('".$from."') and ('".$to."')  and r.paid='YES'
  group by(r.res_date)";
$result = mysqli_query($conn, $query);

?>
<br>
<br>
<br>
<br>
<br>
<br>
<h1>Daily payments within specific period</h1>
<table border ="1" cellspacing="0" cellpadding="10" align="center">
  <tr>
  <th>reservation date</th>
    <th>payments</th>
    

    
  </tr>
<?php
if (mysqli_num_rows($result) > 0) {
    while($data = mysqli_fetch_assoc($result)) {
        ?>
       <tr>
        <td><?php echo $data['res_date']; ?> </td>
        <td><?php echo $data['sum(payment)']; ?> </td>
        

        
        <?php
    
    ?>
  
        <?php 
    }
}
?>
  </table>
  
  <button class="button"  align="center" onclick="window.location.href='http://localhost/finalproject_car/admin/information/info5.php'">
      Back
  </button>
</body>
</html>
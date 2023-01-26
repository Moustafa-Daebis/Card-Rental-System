<?php
session_start();
?>
<html>
    <head>
        <style type="text/css">
            th, td {
             color: aliceblue;
             font-family: 'Courier New', Courier, monospace;
            }
            body {
             background-color: rgb(74, 83, 85);
            }
            input{
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
   

        <div class = container>
        </div>
        <br>
        <br>
        <h1>Advanced Search</h1>
        <br>
        <br>
        <br>
        <br>
        <form name="myForm"  onsubmit="return validate()" action="" method="post">
            <table cellspacing='5' align='center'>
                <tr><td></td><td><input type='text' name='name' placeholder="Enter name"/></td></tr>
                <tr><td></td><td><input type='text' name='res_id' placeholder="Enter res_id"/></td></tr>
                <tr><td></td><td><input type='text' name='E_mail'placeholder="Enter E_mail"/></td></tr>
                <tr><td></td><td><input type="text" id="country" placeholder="Enter country"></td></tr>
                <tr><td></td><td><input type="text"  name="city"  placeholder="Enter city"></td></tr>
                <tr><td></td><td><input type="text"  name="address"  placeholder="Enter address"></td></tr>
                <tr><td></td><td><input type="text"  name="gender"  placeholder="Enter gender"></td></tr>
                <tr><td></td><td><input type='text' name='plate_id' placeholder="Enter plate id"/></td></tr>
                <tr><td></td><td><input type='text' name='brand' placeholder="Enter brand"/></td></tr>
                <tr><td></td><td><input type='text' name='color'placeholder="Enter color"/></td></tr>
                <tr><td></td><td><input type="number" id="year" name="year" min="2001" max="2023"placeholder="year"></td></tr>
                <tr><td></td><td><input type="text"  name="model"  placeholder="Enter model"></td></tr>
                <tr><td></td><td><input type='date' name='day' placeholder="Enter reservation day"/></td></tr>
                <tr><td></td><td><input type='submit' name='submit' id="submit" value='Submit'/> <input type='button' name='back' id="back" value='back' onclick="window.location.href='http://localhost/finalproject_car/admin/admin.php'"/> <input type="reset"></td></tr> 
                </table>
        </form>
    </body>
</html>
<?php
if(isset($_POST['submit'])){
    $_SESSION['E_mail'] = $_POST['E_mail'];
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['res_id'] = $_POST['res_id'];

    $_SESSION['country'] = $_POST['country'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['plate_id'] = $_POST['plate_id'];
    $_SESSION['brand'] = $_POST['brand'];
    $_SESSION['color'] = $_POST['color'];
    $_SESSION['model'] = $_POST['model'];
    $_SESSION['year'] = $_POST['year'];
    $_SESSION['day'] = $_POST['day'];
    echo "<script type='text/javascript'>;location='http://localhost/finalproject_car/admin/adminsearchresults.php';</script></script>";
}

?>
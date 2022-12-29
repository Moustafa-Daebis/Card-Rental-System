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

    
            <script>
                function validate(){
                    alert("please choose an option")
                    var x = document.forms["myForm"]["brand"].value;
                    var y = document.forms["myForm"]["color"].value;
                    var w = document.forms["myForm"]["year"].value;
                    var z = document.forms["myForm"]["model"].value;
                    if (x == "" && y == "" && z="" && w=""){
                        alert("please choose an option")
                        return false
                    }
                    return true
                }
            </script>
    </head>    
    <body>
    <?php
    if(isset($_POST['submit'])){
        $_SESSION['brand'] = $_POST['brand'];
        $_SESSION['color'] = $_POST['color'];
        $_SESSION['year'] = $_POST['year'];
        $_SESSION['model'] = $_POST['model'];
        $_SESSION['from'] = $_POST['from'];
        $_SESSION['to'] = $_POST['to'];
        echo "<script type='text/javascript'>;location='http://localhost/finalproject_car/customer/reservationresults.php';</script></script>";
    }

?>

        <div class = container>
        </div>
        <br>
        <br>
        <h1>Reserve a car</h1>
        <br>
        <br>
        <br>
        <br>
        <form name="myForm"  onsubmit="return validate()" action="" method="post">
            <table cellspacing='5' align='center'>
                <tr><td>brand:</td><td><input type='text' name='brand' placeholder="Enter brand"/></td></tr>
                <tr><td>color:</td><td><input type='text' name='color'placeholder="Enter color"/></td></tr>
                <tr><td>year:</td><td><input type="number" id="year" name="year" min="2001" max="2023">
                <tr><td>model:</td><td><input type="text"  name="model"  placeholder="Enter model">
                <tr><td>from:</td><td><input type="date"  name="from"  placeholder="Enter start time">
                <tr><td>to:</td><td><input type="date"  name="to"  placeholder="Enter end time">
                <tr><td>Pay now:                 <select name="paid" id="paid">
                <option value="YES">    yes</option>
                <option value="NO">    no</option>
                </select>
                </td><td> 
                <tr><td>Pay date:</td><td>  <input type="date"  name="paid_date"  placeholder="Enter end time">
                <tr><td></td><td><input type='submit' name='submit' id="submit" value='Submit'/> <input type='button' name='back' id="back" value='back' onclick="window.location.href='http://localhost/finalproject_car/customer/customer.php'"> <input type="reset"></td></tr> 
                </table>
        </form>
    </body>
</html>

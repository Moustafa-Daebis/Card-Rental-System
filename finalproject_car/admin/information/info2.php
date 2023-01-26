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
                    var x = document.forms["myForm"]["plate_id"].value;
                    var y = document.forms["myForm"]["from"].value;
                    var z = document.forms["myForm"]["to"].value;

                    
                    if (x == "" && y == ""&& z == "" ){
                        alert("please choose an option")
                        return false
                    }
                }
            </script>
    </head>    
    <body>
    <?php
    if(isset($_POST['submit'])){
        $_SESSION['plate_id'] = $_POST['plate_id'];
        $_SESSION['to'] = $_POST['to'];
        $_SESSION['from'] = $_POST['from'];
        echo "<script type='text/javascript'>;location='http://localhost/finalproject_car/admin/information/result2.php';</script></script>";
    }

?>

        <div class = container>
        </div>
        <br>
        <br>
        <h1>All  reservations  of   any   car  within  a  specified  period</h1>
        <br>
        <br>
        <br>
        <br>
        <form name="myForm"  onsubmit="return validate()" action="" method="post">
            <table cellspacing='5' align='center'>
            <tr><td>plate_id:</td><td><input type='text' name='plate_id' placeholder="Enter plate_id"/></td></tr>
            <tr><td>Start:</td><td><input type='date' name='from'/></td></tr>
                <tr><td>End:</td><td><input type='date' name='to'/></td></tr>
                <tr><td></td><td><input type='submit' name='submit' id="submit" value='Submit'/> <input type='button' name='back' id="back" value='back' onclick="window.location.href='http://localhost/finalproject_car/admin/information/infohub.php'"/> <input type="reset"></td></tr> 
                </table>
        </form>
    </body>
</html>
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
                    var x = document.forms["myForm"]["E_mail"].value;
                    if (x == "" ){
                        alert("please insert an E_mail")
                        return false
                    }
                    return true
                }
            </script>
    </head>    
    <body>
    <?php
    if(isset($_POST['submit'])){
        $_SESSION['E_mail'] = $_POST['E_mail'];
        echo "<script type='text/javascript'>;location='http://localhost/finalproject_car/admin/information/result4.php';</script></script>";
    }

?>

        <div class = container>
        </div>
        <br>
        <br>
        <h1>All  reservations  of  specific  customer</h1>
        <br>
        <br>
        <br>
        <br>
        <form name="myForm"  onsubmit="return validate()" action="" method="post">
            <table cellspacing='5' align='center'>
            <tr><td></td><td><input type='text' name='E_mail' placeholder="Enter email"/></td></tr>
                <tr><td></td><td><input type='submit' name='submit' id="submit" value='Submit'/> <input type='button' name='back' id="back" value='back' onclick="window.location.href='http://localhost/finalproject_car/admin/information/infohub.php'"/> <input type="reset"></td></tr> 
                </table>
        </form>
    </body>
</html>
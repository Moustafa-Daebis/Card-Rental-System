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
                    var z = document.forms["myForm"]["year"].value;
                    if (x == "" && y == "" && z="" &&w=""){
                        alert("please choose an option")
                    return false
                    
                    }
                    return true
                }
            </script>
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
                <tr><td></td><td><input type='text' name='name' placeholder="Enter brand"/></td></tr>
                <tr><td></td><td><input type='text' name='email'placeholder="Enter color"/></td></tr>
                <tr><td></td><td><input type="text" id="country" placeholder="Enter country"></td></tr>
                <tr><td></td><td><input type="text"  name="model"  placeholder="Enter model"></td></tr>
                <tr><td></td><td><input type="text"  name="address"  placeholder="Enter address"></td></tr>
                <tr><td></td><td><input type="text"  name="gender"  placeholder="Enter gender"></td></tr>
                <tr><td></td><td><input type='text' name='brand' placeholder="Enter plate id"/></td></tr>
                <tr><td></td><td><input type='text' name='brand' placeholder="Enter brand"/></td></tr>
                <tr><td></td><td><input type='text' name='color'placeholder="Enter color"/></td></tr>
                <tr><td></td><td><input type="number" id="year" name="year" min="2001" max="2023"placeholder="year"></td></tr>
                <tr><td></td><td><input type="text"  name="model"  placeholder="Enter model">
                <tr><td></td><td><input type='text' name='day' placeholder="Enter reservation day"/></td></tr>
                <tr><td></td><td><input type='submit' name='submit' id="submit" value='Submit'/> <input type='button' name='back' id="back" value='back' onclick="window.location.href='http://localhost/car_rental/admin.php'"/> <input type="reset"></td></tr> 
                </table>
        </form>
    </body>
</html>
<?php
if(isset($_POST['submit'])){
    $_SESSION['carbrand'] = $_POST['brand'];
    $_SESSION['carcolor'] = $_POST['color'];
    $_SESSION['caryear'] = $_POST['year'];
    $_SESSION['carmodel'] = $_POST['model'];
    echo "<script type='text/javascript'>;location='http://localhost/car_rental/adminsearchresults.php';</script></script>";
}

?>
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
                if (x == ""){
                    alert("please enter your E-mail!")
                    return false
                }
                if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.email.value))){
                    alert("You have entered an invalid E_mail address!")
                    return false
                }
                var y = document.forms["myForm"]["password"].value;
                if (y == ""){
                    alert("please enter password!")
                    return false
                }
            }
        </script>
    </head>
    <body>
    <?php
session_start();
if(isset($_POST['submit']))
{

 $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
 mysqli_select_db($conn, 'fproject') or die(mysqli_error($conn));
 $E_mail=$_POST['E_mail'];
 $password=$_POST['password'];
 if($E_mail!=''&&$password!='')
 {
   $query=mysqli_query($conn, "select * from admin where E_mail='".$E_mail."' and password='".$password."'") or die(mysqli_error($conn));
   $res=mysqli_fetch_row($query);
   if($res)
   {

    $_SESSION['E_mail']=$E_mail;

    echo "<script type='text/javascript'>location='http://localhost/admin.php';</script></script>";
   }
   else
   {
    echo '<script>alert("You entered username or password is incorrect")</script>';

   }
 }
 else
 {
    echo '<script>alert("Enter both username and password")</script>';

 }
}
?>
        <div class = container>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1>Admin Login</h1>
        <form name="myForm"  onsubmit="return validate()" action=# method="post">
            <table cellspacing='5' align='center'>
                <tr><td>E-mail:</td><td><input type='email' name='E_mail'  placeholder="Enter E_mail"/></td></tr>
                <tr><td>Password:</td><td><input type='password' name='password'  placeholder="Enter password"/></td></tr>
                <tr><td></td><td><input type='submit' name='submit' id="submit" value='Submit'/> <input type='button' name='back' id="back" value='back' onclick="window.location.href='http://localhost/Home.html'"/> <input type="reset"></td></tr> 
                
                </table>
        </form>
      
    </body>
</html>

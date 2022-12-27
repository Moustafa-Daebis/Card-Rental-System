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
                if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.email.value))){
                    alert("You have entered an invalid email address!")
                    return false
                }
                var w = document.forms["myForm"]["name"].value;
                if (w == ""){
                    alert("please enter name!")
                    return false
                }
                var x = document.forms["myForm"]["email"].value;
                if (x == ""){
                    alert("please enter your e-mail!")
                    return false
                }
                var y = document.forms["myForm"]["password"].value;
                if (y == ""){
                    alert("please enter password!")
                    return false
                }
                var z = document.forms["myForm"]["confirmpassword"].value;
                if (z == ""){
                    alert("please enter your password again to confirm!")
                    return false
                }
                if (y != z) {
                    alert("passwords don't match!")
                    return false
                }
                var number_phone1 = document.forms["myForm"]["phone"].value;
                if (number_phone1 == ""){
                    alert("please enter your phone_number!")
                    return false
                }
                var country1 = document.forms["myForm"]["country"].value;
                if (country1 == ""){
                    alert("please enter your country!")
                    return false
                }
                var city1 = document.forms["myForm"]["city"].value;
                if (city1 == ""){
                    alert("please enter your city!")
                    return false
                }
                var address1 = document.forms["myForm"]["Address"].value;
                if (address1 == ""){
                    alert("please enter your address!")
                    return false
                }
                var card_number1 = document.forms["myForm"]["card_number"].value;
                if (card_number1 == ""){
                    alert("please enter your card_number!")
                    return false
                }
              }
        </script>
    </head>
    <body>
    <?php
 if(isset($_POST['submit']))
 {
  $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
  mysqli_select_db($conn,'fproject') or die(mysqli_error($conn));
  $E_mail=$_POST['E_mail'];
  $password=$_POST['password'];
  $name=$_POST['name'];
  $country=$_POST['country'];
  $city=$_POST['city'];
  $phone=$_POST['phone'];
  $address=$_POST['address'];
  $card_number=$_POST['card_number'];
  $sex=$_POST['sex'];
  
 
  $q=mysqli_query($conn,"select * from customer where  E_mail='".$E_mail." ' or phone='".$phone."' ") or die(mysqli_error($conn));
  $n=mysqli_fetch_row($q);
  if($n>0)
  {
    echo "<script>alert('E_mail or Phone already exists');</script>";
   $er=''.$E_mail.' or '.$phone.' is already present in our database';
   

   
  }
  else
  {
 
   $insert=mysqli_query($conn,"INSERT INTO customer (E_mail, password, name,country,city,phone,address,card_number,sex) VALUES ('$E_mail', MD5('".$password."'),'$name','$country','$city','$phone','$address','$card_number','$sex')") or die(mysqli_error($conn));

   if($insert)
   {
    $er='Values are registered successfully';
    echo "<script>alert('Values are registered successfully');</script>";

   }
   else
   {
    $er='Values are not registered';
    echo "<script>alert('Values are not registered');</script>";

   }
  }
 }
?>
        <div class = container>
        </div>
        <br>
        <br>
        <h1>Customer Register</h1>
        <br>
        <br>
        <br>
        <br>
        <form name="myForm" action=# onsubmit="return validate()" method="post">
            <table cellspacing='5' align='center'>
                <tr><td>Name:</td><td><input type='text' name='name' placeholder="Enter name"/></td></tr>
                <tr><td>E-mail:</td><td><input type='E_mail' name='E_mail'placeholder="Enter email"/></td></tr>
                <tr><td>Password:</td><td><input type='password' name='password'placeholder="Enter password"/></td></tr>
                <tr><td>Confirm Password:</td><td><input type='password' name='confirmpassword'placeholder="Confirm password"/></td></tr>
                <tr><td>Phone:</td><td><input type="tel" id="phone" name="phone" pattern="[+]{1}[0-9]{11,14}" required placeholder="+12345678912"/></td></tr>
                <tr><td>Country:</td><td><input type='text' name='country'placeholder="Enter country"/></td></tr>
                <tr><td>City:</td><td><input type='text' name='city'placeholder="Enter city" /></td></tr>
                <tr><td>Address:</td><td><input type='text' name='address'placeholder="Enter Address"/></td></tr>
                <tr><td>Sex:</td><td><input type='text' name='sex'placeholder="male or female"/></td></tr>
              <tr><td>Credit Card Number:</td><td><input  type="tel" name='card_number'  pattern="[0-9\s]{13,19}"  maxlength="19" placeholder="xxxx xxxx xxxx xxxx"/></td></tr>
              <tr><td></td><td><input type='submit' name='submit' id="submit" value='Submit'/> <input type='button' name='back' id="back" value='back' onclick="window.location.href='http://localhost/Home.html'"/> <input type="reset"></td></tr> 
                </table>
        </form>
    </body>
</html>

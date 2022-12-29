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
                var x = document.forms["myForm"]["office_id"].value;
                if (x == ""){
                    alert("please enter the office id!")
                    return false
                }
                
                var y = document.forms["myForm"]["country"].value;
                if (y == ""){
                    alert("please enter the country!")
                    return false
                }
                var z= document.forms["myForm"]["city"].value;
                if (y == ""){
                    alert("please enter the city!")
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
  $office_id=$_POST['office_id'];
  $country=$_POST['country'];
  $city=$_POST['city'];
 
  
  
  
 
  $q=mysqli_query($conn,"select * from office where  office_id='".$office_id. "'") or die(mysqli_error($conn));
  $n=mysqli_fetch_row($q);
  if($n>0)
  {
   
   $er=''.$office_id.' is already present in our database';
   echo "<script>alert('office is already presented in our database');</script>";


   

   
  }
  else
  {
 
    $insert=mysqli_query($conn,"INSERT INTO office (office_id,country,city) VALUES ('$office_id','$country','$city')") or die(mysqli_error($conn));

   if($insert)
   {
    $er='New office is added successfully';
    echo "<script>alert('New office is added successfully');</script>";

   }
   else
   {
    $er='Values are not registered';
    echo "<script>alert('office is not registered');</script>";

   }
  }
 }
?>
        <div class = container>
        </div>
        <br>
        <br>
        <h1>Add a new office</h1>
        <br>
        <br>
        <br>
        <br>
        <form name="myForm" action=# onsubmit="return validate()" method="post">
            <table cellspacing='5' align='center'>
                <tr><td>office_id:</td><td><input type='text' name='office_id' placeholder="Enter office_id"/></td></tr>
                <tr><td>country:</td><td><input type='text' name='country'placeholder="Enter country"/></td></tr>
                <tr><td>city:</td><td><input type='text' name='city'placeholder="Enter city"/></td></tr>
              <tr><td></td><td><input type='submit' name='submit' id="submit" value='Submit'/> <input type='button' name='back' id="back" value='back' onclick="window.location.href='http://localhost/finalproject_car/admin/admin.php'"/> <input type="reset"></td></tr> 
                </table>
        </form>
    </body>
</html>

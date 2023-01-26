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
                if (x == ""){
                    alert("please enter plate_id!")
                    return false
                }
                
                var y = document.forms["myForm"]["brand"].value;
                if (y == ""){
                    alert("please enter brand!")
                    return false
                }
                var z = document.forms["myForm"]["model"].value;
                if (z == ""){
                    alert("please enter model!")
                    return false
                }
                var m = document.forms["myForm"]["year"].value;
                if (m == ""){
                    alert("please enter year!")
                    return false
                }
                var n = document.forms["myForm"]["color"].value;
                if (n== ""){
                    alert("please enter  color!")
                    return false
                }
                var w = document.forms["myForm"]["price_per_day"].value;
                if (w == ""){
                    alert("please enter price_per_day!")
                    return false
                }
                var c= document.forms["myForm"]["office_id"].value;
                if (c == ""){
                    alert("please enter office_id!")
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
  $plate_id=$_POST['plate_id'];
  $brand=$_POST['brand'];
  $model=$_POST['model'];
  $year=$_POST['year'];
  $color=$_POST['color'];
  $price_per_day=$_POST['price_per_day'];
  $office_id=$_POST['office_id'];

  
  
  
 
  $q=mysqli_query($conn,"select * from car where  plate_id='".$plate_id. "'") or die(mysqli_error($conn));
  $n=mysqli_fetch_row($q);
  if($n>0)
  {
   
   $er=''.$plate_id.' is already present in our database';
   echo "<script>alert('is already present in our database');</script>";


   

   
  }
  else
  {
 
    $insert=mysqli_query($conn,"INSERT INTO car (plate_id,brand,model,year,color,price_per_day,office_id) VALUES ('$plate_id','$brand','$model','$year','$color','$price_per_day','$office_id')") or die(mysqli_error($conn));
    $insert1=mysqli_query($conn,"INSERT INTO car_status (plate_id) VALUES ('$plate_id')") or die(mysqli_error($conn));
   if($insert&&$insert1)
   {
    $er='New car is added successfully';
    echo "<script>alert('New car is added successfully');</script>";

   }
   else
   {
    $er='Values are not registered';
    echo "<script>alert('car is not registered');</script>";

   }
  }
 }
?>
        <div class = container>
        </div>
        <br>
        <br>
        <h1>Add a new car</h1>
        <br>
        <br>
        <br>
        <br>
        <form name="myForm" action=# onsubmit="return validate()" method="post">
            <table cellspacing='5' align='center'>
                <tr><td>plate_id:</td><td><input type='text' name='plate_id' placeholder="Enter plate_id"/></td></tr>
                <tr><td>brand:</td><td><input type='text' name='brand'placeholder="Enter brand"/></td></tr>
                <tr><td>model:</td><td><input type='text' name='model'placeholder="Enter model"/></td></tr>
                <tr><td>year:</td><td><input type="number" id="year" name="year" min="2001" max="2023">
                <tr><td>color:</td><td><input type='text' name='color'placeholder="Enter color"/></td></tr>
                <tr><td>price_per_day:</td><td><input type='double' name='price_per_day'placeholder="Enter price_per_day"/></td></tr>
                <tr><td>office_id:</td><td><input type='int' name='office_id'placeholder="Enter office_id"/></td></tr>

              
              <tr><td></td><td><input type='submit' name='submit' id="submit" value='Submit'/> <input type='button' name='back' id="back" value='back' onclick="window.location.href='http://localhost/finalproject_car/admin/admin.php'"/> <input type="reset"></td></tr> 
                </table>
        </form>
    </body>
</html>

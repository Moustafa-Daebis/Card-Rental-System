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

            <script>
            function validate(){
                var x = document.forms["myForm"]["plate_id"].value;
                if (x == ""){
                    alert("please enter the plate_id")
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
    mysqli_select_db($conn,'fproject') or die(mysqli_error($conn));
    $plate_id=$_POST['plate_id'];
    $carst=$_POST['carst'];

    $q=mysqli_query($conn,"select * from car_status where  plate_id='".$plate_id." '") or die(mysqli_error($conn));
    $n=mysqli_fetch_row($q);
    if($n>0)
    {
        $insert=mysqli_query($conn,"INSERT INTO car_status (plate_id,carst) VALUES ('$plate_id', '$carst')") or die(mysqli_error($conn));
        echo "<script>alert('Car is updated successfully');</script>";


    }
    else
    {
        echo "<script>alert('No such a car!');</script>";
     
     
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
        <h1>Update car status</h1>
        <form name="myForm"  onsubmit="return validate()" action=# method="post">
            <table cellspacing='5' align='center' >
            <tr><td>plate_id:</td><td><input type='text' name='plate_id' placeholder="Enter plate_id"/></td></tr>
             <tr><td>car_status:<select name="carst" id="carst">
             <optgroup label="car status">
                <option value="available">available</option>
                <option value="rented">rented</option>
                <option value="out of services">out of services</option>
                </select>
            </td></tr>
                <tr><td></td><td><input type='submit' name='submit' id="submit" value='Submit'/> <input type='button' name='back' id="back" value='back' onclick="window.location.href='http://localhost/finalproject_car/admin/admin.php'"/> <input type="reset"></td></tr> 
                
                </table>
        </form>
      
    </body>
</html>

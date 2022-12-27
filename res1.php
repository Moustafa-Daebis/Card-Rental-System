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
        <h1>Reserve a car</h1>
        <br>
        <br>
        <br>
        <br>
        <form name="myForm" action=# onsubmit="return validate()" method="post">
            <table cellspacing='5' align='center'>
                <tr><td>brand:</td><td><input type='text' name='brand' placeholder="Enter brand"/></td></tr>
                <tr><td>color:</td><td><input type='text' name='color'placeholder="Enter color"/></td></tr>
                <tr><td>year:</td><td><input type="number" id="year" name="year" min="2001" max="2023">
                <tr><td></td><td><input type='submit' name='submit' id="submit" value='Submit'/> <input type='button' name='back' id="back" value='back' onclick="window.location.href='http://localhost/res.php'"/> <input type="reset"></td></tr> 
                </table>
        </form>
    </body>
</html>

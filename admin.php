<html>
<head>
<style>
body {
  background-color: rgb(74, 83, 85);
}
.button {
        background-color: #3969c9;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 8px;
      }

.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
.center1 {
    position: center;
  display: flex;
  top: 50%;
  left: 50%;
  justify-content: center;
  align-items: center;
  height: 50px;
 
}
h1 {
  font-size: 5em; 
  text-align: center;
  font-family: "Lucida Console", "Courier New", monospace;
  color: rgba(20, 233, 222, 0.562);
}
h2 {
  text-align: center;
  font-family: "Lucida Console", "Courier New", monospace;
  color: rgb(255, 254, 254);
}


body {
background-image: url('2022-S-MAYBACH-GAL-008-D-FE-DR.jpg');
background-size: 100% 100%;
backdrop-filter: blur(10px);
}
</style>
</head>
<body>



<div class="container">
  <br>
  <br>
  <br>
  <br>
  <h1>Car rental services</h1>
  <br>
  <br>
</div>
  <div class="container">
  <div class="center">
      <button class="button" onclick="window.location.href='http://localhost/newcar.php'">
      Add a new car
    </button>
    <button class="button" onclick="window.location.href='http://localhost/res1.php'">
      Update a car
    </button>
    <button class="button" onclick="window.location.href='http://localhost/info.php'">
      Infromation!
    </button>
      <div class="center1">
      <button class="button" onclick="window.location.href='http://localhost/office.php'">
      Add an office
    <button class="button"  onclick="window.location.href='http://localhost/Adminloginform.php'">
      Back
    </button>
    </div>
  </div>
</div>

</body>
</html>

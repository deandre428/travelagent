<?php 
include './server/DBController.php';
$db_handle = new DBController();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link href="css/cart.css" type="text/css" rel="stylesheet" />
 <link href="css/home.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" href="css/parking.css">
 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
 <script type="text/javascript" src="js/card.js"></script>
 <title>Checkout</title>
</head>
<body>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Menu</span>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="./login.php">Login</a>
    <a href="./login.php">Register</a>
    <a href="./search.php">Car Rental</a>
    <a href="./search.php">Parking Services</a>
    <a href="./login.php">Logout</a>
  </div>
<div id="main_contain">
<h2>Checkout</h2>
<?php
foreach($_REQUEST as $key => $val){
 if($val != $_REQUEST["_ga"]){
  if($val != $_REQUEST["PHPSESSID"]){
   // if($val == $_REQUEST[])
   print("<p>$key = $val</p>\n");
  }
 }
}
?>
</div>

<div id="bodyTable">
<form action="../aux/output.php" method="post" id="signup_form" oninput="checkForm(this);">
<h2>Credit Card Form</h2>
   <h1>User Registration</h1>

  <label id="password_label" for="password">Security Code</label>
  <input id="password" name="password" type="password" />

  <label id="CardNumberLabel" for="cardNumber">Card Number:</label> 
  <input id="cardNumber" name="cardNumbere" type="text" />
  
  <label id="NameOnCardLabel" for="NameOnCard">Name On Card</label>
  <input id="NameOnCard" name="NameOnCard" type="text" />
  
  <label id="expiration" for = "expiration">Expiration</label>
  <input id="submit" type="submit" value="Checkout">
  <?php
    echo "<select name=month>";
    for($i = 0; $i <= 11; $i++){
      $month = date('F', strtotime("first day of $i month"));
      echo "<option value=$month>$month</option> ";
    }
    echo "</select>";
    echo "<select name=year>";
    for($i = 0; $i <= 5; $i++){
      $year = date('Y', strtotime("last day of +$i year"));
      echo "<option name='$year'>$year</option>";
    }
    echo "</select>";
  ?>
  <input id="submit" type="submit" value="Check Out" />
  </div>
</form>
</body>
<script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
      document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft = "0";
      document.body.style.backgroundColor = "white";
    }
  </script>
</html>

<!-- // $carID = array($_POST['CarID']);
// foreach($carID as $id){
//  $query = "SELECT * from cars WHERE CarID='{$id}'";
//  $result = $db_handle->runQuery($query);
// }
// foreach ($result as $key => $value) {
//  echo 'Car ID: '.$result[$key]['CarID'].'<br>';
//  echo 'Make: '.$result[$key]['make'].'<br>';
//  echo 'Color: '.$result[$key]['color'].'<br>';
//  echo 'Model: '.$result[$key]['model'].'<br>';
//  echo 'Year: '.$result[$key]['year'].'<br>';
//  echo 'Class: '.$result[$key]['class'].'<br>';
//  echo 'Location: '.$result[$key]['location'].'<br>';
//  echo 'Price: '.$result[$key]['price'].'<br>';
//  echo 'Available: '.$result[$key]['available'].'<br>';
// } -->
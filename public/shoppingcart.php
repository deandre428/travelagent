<?php 
include 'DBController.php';
$db_handle = new DBController();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link href="css/shoppingcart.css" type="text/css" rel="stylesheet" />
 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
 <script src="shoppingcart.js"></script>
 <title>Checkout</title>
</head>
<body>
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
</body>
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
<?php
session_start();
include './server/DBController.php';
$db_handle = new DBController();
$classResult = $db_handle->runQuery("SELECT DISTINCT class FROM cars ORDER BY class ASC");
?>
<html>
<head>
<link href="css/search.css" type="text/css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<title>Search Car Information</title>
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
    <h2>Rent-A-Car</h2>
    <form method="post" name="search" action="./search.php">
            <div class="search-box">
                <select id="Place" name="class[]" multiple="multiple">
                    <option value="0" selected="selected">Select class</option>
                        <?php
                        if (! empty($classResult)) {
                            foreach ($classResult as $key => $value) {
                                echo '<option value="' . $classResult[$key]['class'] . '">' . $classResult[$key]['class'] . '</option>';
                            }
                        }
                        ?>
                </select><br><br>
                <button id="Filter">Search</button>
            </div>
    </form>
<form action="./cart.php" id="checkoutForm">
<div class="demo-grid">
        <?php if (! empty($_POST['class'])) { ?>
        <table cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th><strong>Car ID</strong></th>
                    <th><strong>Color</strong></th>
                    <th><strong>Make</strong></th>
                    <th><strong>Model</strong></th>
                    <th><strong>Year</strong></th>
                    <th><strong>Class</strong></th>
                    <th><strong>Location</strong></th>
                    <th><strong>Price</strong></th>
                    <th><strong>Available</strong></th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $query = "SELECT * from cars"; 
            $i = 0;
            $selectedOptionCount = count($_POST['class']); $selectedOption = "";
            while ($i < $selectedOptionCount)
            {
                $selectedOption = $selectedOption . "'" . $_POST['class'][$i] . "'";
                if ($i < $selectedOptionCount - 1)
                {
                    $selectedOption = $selectedOption . ", ";
                }
                $i ++;
            }
            $query = $query . " WHERE class in (" . $selectedOption . ")";
            $result = $db_handle->runQuery($query);
        }
        if (! empty($result)) {
            foreach ($result as $key => $value) { ?>
            <tr id="CarID<?php echo $result[$key]['CarID']?>">
                <td>
                <input type="radio" name="CarID" class="CarID<?php echo $result[$key]['CarID']?>" value="<?php echo $result[$key]['CarID']?>"><?php echo $result[$key]['CarID']; ?>
                </td>
                <td>
                <input type="hidden" name="color" class="CarID<?php echo $result[$key]['CarID']?>" value="<?php echo $result[$key]['color']?>"><?php echo $result[$key]['color']; ?> 
                </td>
                <td>
                <input type="hidden" name="make" class="CarID<?php echo $result[$key]['CarID']?>" value="<?php echo $result[$key]['make']?>"><?php echo $result[$key]['make']; ?> 
                </td>
                <td>
                <input type="hidden" name="color" class="CarID<?php echo $result[$key]['CarID']?>" value="<?php echo $result[$key]['model']?>"><?php echo $result[$key]['model']; ?>
                </td>
                <td>
                <input type="hidden" name="year" class="CarID<?php echo $result[$key]['CarID']?>" value="<?php echo $result[$key]['year']?>"><?php echo $result[$key]['year']; ?>
                </td>
                <td>
                <input type="hidden" name="class" class="CarID<?php echo $result[$key]['CarID']?>" value="<?php echo $result[$key]['class']?>"><?php echo $result[$key]['class']; ?>
                </td>
                <td>
                <input type="hidden" name="location" class="CarID<?php echo $result[$key]['CarID']?>" value="<?php echo $result[$key]['location']?>"><?php echo $result[$key]['location']; ?>
                </td>
                <td>
                <input type="hidden" name="price" class="CarID<?php echo $result[$key]['CarID']?>" value="<?php echo $result[$key]['price']?>"><?php echo $result[$key]['price']; ?>
                </td>
                <td>
                <input type="hidden" name="availability" class="CarID<?php echo $result[$key]['CarID']?>" value="<?php echo $result[$key]['available']?>"><?php echo $result[$key]['available']; ?>
                </td>
            </tr>
            
        <?php }} ?>
        </tbody>
        </table>
        
        <br><br><br>
        
    <table cellpadding="10" cellspacing="1">
        <thead>
            <tr>
                <th><strong>Spot No.</strong></th>
                <th><strong>Spot Price</strong></th>
                <th><strong>Available</strong></th>
                <th><strong>VIP</strong></th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $query = "SELECT * FROM parking"; 
            $result = $db_handle->runQuery($query);
        if (!empty($result)) {
            foreach ($result as $key => $value) { ?>
            <tr>
                <td>
                <input type="radio" name="Parking_nr" class="Parking_nr<?php echo $result[$key]['Parking_nr']?>" value="<?php echo $result[$key]['Parking_nr']?>"><?php echo $result[$key]['Parking_nr']; ?>
                </td>
                <td>
                <input type="hidden" name="Spot_Price" class="Parking_nr<?php echo $result[$key]['Parking_nr']?>" value="<?php echo $result[$key]['Spot_Price']?>"><?php echo $result[$key]['Spot_Price']; ?> 
                </td>
                <td>
                <input type="hidden" name="available" class="Parking_nr<?php echo $result[$key]['Parking_nr']?>" value="<?php echo $result[$key]['available']?>"><?php echo $result[$key]['available']; ?> 
                </td>
                <td>
                <input type="hidden" name="VIP" class="Parking_nr<?php echo $result[$key]['Parking_nr']?>" value="<?php echo $result[$key]['VIP']?>"><?php echo $result[$key]['VIP']; ?>
                </td>
            </tr>
            <?php }} ?>
            </tbody>
        </table>
    </div>
    <input id="submitCheckout" type="submit" value="Checkout">        
</form>
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
<script>
$('#submitCheckout').on('click', function () {
  var carSelector = $('input[name=CarID]:checked', '#checkoutForm').attr('class');
  var spotSelector = $('input[name=Parking_nr]:checked', '#checkoutForm').attr('class');
  console.log(carSelector);
  console.log(spotSelector);
  var car_data_arr = [];
  var spot_data_arr = [];
    var car = $("." + carSelector);
    var spot = $("." + spotSelector);
    car.each(function(){
        var carInfo = $(this).val()
        car_data_arr.push(carInfo);
    });
    spot.each(function(){
        var spotInfo = $(this).val()
        spot_data_arr.push(spotInfo);
    });
    console.log(car_data_arr);
    console.log(spot_data_arr);
    $("form#checkout").on('click', function(e, car_data_arr, spot_data_arr){
        e.preventDefault();
        $.ajax({
            type: "post",  //type of method
            url: "cart.php",  //your page
            data: { car: car_data_arr, spot: spot_data_arr},// passing the values
            success: function (res) {
                console.log(res);
            }
        });
    });
});
</script>
</body>
</html>
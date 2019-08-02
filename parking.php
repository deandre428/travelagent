<?php 
include '../server/DBController.php';
$db_handle = new DBController();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Quiz 2 Bonus</title>
    
  <script type="text/javascript" src="js/register.js">
  </script>
  <link rel="stylesheet" href="css/parking.css">
</head>

<body>

<form action="../aux/output.php"
      method="post"
      id="signup_form"
      onsubmit="return checkForm(this);">
<table id = "bodyTable">
  <tr>
    <th colspan="2"> <h1>Credit Card Scanner</h1> </th></tr>
  <tr>
    <td>
<label id="CardNumberLabel" for="cardNumber">Card Number:</label> </td>
<td>
<label id="password_label" for="password">Security Code</label></td> 

</tr>
<tr>
<td>
 <input id="cardNumber" name="cardNumbere" type="text" /></td>
 <td>
 <input id="password" name="password" type="password" />
 </td>
</tr>
<tr>
    <td>             
<label id="NameOnCardLabel" for="NameOnCard">Name On Card</label>
</td>
<td>
  <label id="expiration" for = "expiration">Expiration</label>
</td>
</tr>
<tr>
  <td>
 <input id="NameOnCard" name="NameOnCard" type="text" />
</td> <td>
        <?php
        echo "<select name=month>";
        for($i=0;$i<=11;$i++){
        $month=date('F',strtotime("first day of $i month"));
        echo "<option value=$month>$month</option> ";
        }
        echo "</select>";
        echo "<select name=year>";
                for($i=0;$i<=5;$i++){
                $year=date('Y',strtotime("last day of +$i year"));
                echo "<option name='$year'>$year</option>";
                }
                echo "</select>";
                ?>
                </td>
              </tr>
              <tr> <td colspan = "2"> <input id="submit" type="submit" value="Check Out" /></td> </tr>
              <tr ><td></td><td> <p><div id="cardType">
    <ul >
        <li id="AmericanExpress">American Express</li>
        <li id="VISA">Visa</li>
        <li id="MasterCard">Master Card</li>
    </ul>
</div> </p> </td> </tr>
</table>



</form>


<br>
<p>
<br>

</body>
</html>

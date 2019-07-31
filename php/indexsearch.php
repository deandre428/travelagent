<?php
include 'DBController.php';
$db_handle = new DBController();
$classResult = $db_handle->runQuery("SELECT DISTINCT class FROM cars ORDER BY class ASC");
?>
<html>
<head>
<link href="stylesearch.css" type="text/css" rel="stylesheet" />
<title>Search Car Information</title>
</head>
<body>
    
    <h2>Rent a Car</h2>
    

    <p><a href="homepage.html">HOME</a> </p>
    <form method="POST" name="search" action="indexsearch.php">
        <div id="demo-grid">
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
                </select><br> <br>
                <button id="Filter">Search</button>
            </div>
            
                <?php
                if (! empty($_POST['class'])) {
                    ?>
                    <table cellpadding="10" cellspacing="1">

                <thead>
                    <tr>
                        <th><strong>CarID</strong></th>
                        <th><strong>color</strong></th>
                        <th><strong>make</strong></th>
                        <th><strong>model</strong></th>
                        <th><strong>year</strong></th>
                        <th><strong>class</strong></th>
                        <th><strong>location</strong></th>
                        <th><strong>price</strong></th>
                        <th><strong>available</strong></th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT * from cars";
                    $i = 0;
                    $selectedOptionCount = count($_POST['class']);
                    $selectedOption = "";
                    while ($i < $selectedOptionCount) {
                        $selectedOption = $selectedOption . "'" . $_POST['class'][$i] . "'";
                        if ($i < $selectedOptionCount - 1) {
                            $selectedOption = $selectedOption . ", ";
                        }
                        
                        $i ++;
                    }
                    $query = $query . " WHERE class in (" . $selectedOption . ")";
                    
                    $result = $db_handle->runQuery($query);
                }
                if (! empty($result)) {
                    foreach ($result as $key => $value) {
                        ?>
                <tr>
                        <td><div class="col" id="user_data_1"><?php echo $result[$key]['CarID']; ?></div></td>
                        <td><div class="col" id="user_data_2"><?php echo $result[$key]['color']; ?> </div></td>
                        <td><div class="col" id="user_data_3"><?php echo $result[$key]['make']; ?> </div></td>
                        <td><div class="col" id="user_data_1"><?php echo $result[$key]['model']; ?></div></td>
                        <td><div class="col" id="user_data_2"><?php echo $result[$key]['year']; ?> </div></td>
                        <td><div class="col" id="user_data_3"><?php echo $result[$key]['class']; ?> </div></td>
                        <td><div class="col" id="user_data_1"><?php echo $result[$key]['location']; ?></div></td>
                        <td><div class="col" id="user_data_2"><?php echo $result[$key]['price']; ?> </div></td>
                        <td><div class="col" id="user_data_2"><?php echo $result[$key]['available']; ?> </div></td>
                        
                    </tr>
                <?php
                    }
                    ?>
                    
                </tbody>
            </table>
            <?php
                }
                ?>  
        </div>
    </form>
</body>
</html>

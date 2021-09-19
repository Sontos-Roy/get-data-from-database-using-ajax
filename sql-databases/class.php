<?php

include('db.php');


$nameid = $_POST['datapost'];

$q = "SELECT * FROM `class` WHERE `mid` = $nameid";

$result = mysqli_query($con,$q);

while($rows = mysqli_fetch_array($result)){
                        ?>
                <option>
                    <?php echo $rows['classes']; ?>
                </option>
<?php
                            }

?>
<?php

$servername	= "localhost";
$username	= "root";
$password	= "";
$database	= "formdb";

$con = mysqli_connect($servername, $username, $password, $database) or die("Database is not connected");





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Ajax</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center text-info">Get data from database</h2>

        <form action="">
            Username: <input type="text" class="form-control" name="" /><br />
            Password: <input type="text" class="form-control" name="" /><br />

            Degree:
            <select name="" id="" class="form-control" onchange="myfun(this.value)">
                <option>Select any One</option>

                <?php
                            $q = "SELECT * FROM `degree`;";
                            $result = mysqli_query($con,$q);

                            while($rows = mysqli_fetch_array($result)){
                        ?>
                <option value="<?php echo $rows['mid']; ?>">
                    <?php echo $rows['degrees']; ?>
                </option>
                <?php

                            }
                        ?>
            </select>
            <br />
            Class:
            <select name="" id="dataGet" class="form-control">
                <br />
                <option value="">Choose any one</option>
            </select>
            <br /><br />
            <button class="btn btn-info">Click Here</button>
        </form>
    </div>

    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="popper.min.js"></script>
    <script>
        function myfun(datavalue) {
            $.ajax({
                url: "class.php",
                type: "POST",
                data: { datapost: datavalue},

                success: function (result) {
                    $("#dataGet").html(result);
                },
            });
        }
    </script>
</body>

</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "res";

$a1=$_POST["f_id"];
$a2=$_POST["f_name"];
$a3=$_POST["f_price"];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `food` (`f_id`, `f_name`, `f_price`) VALUES ('$a1', '$a2', '$a3') ";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>

<footer>
    <a href="food.php">Food Details</a>
    <a href="addfood.php">Add Food</a>
    <a href="../public/restaurant.php">Restaurant</a>
</footer>


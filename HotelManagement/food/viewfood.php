<!DOCTYPE html>
<html>
<head>
    <title>Restaurant - Admin</title>
    <link rel="stylesheet" type="text/css" href="../public/style/css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>

 

<div class="table"><div id="printableArea">
<table border="1" align="center">



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "res";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM food";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table><tr><th>Food Code</th><th>Food Name</th><th>Food Price</th></tr>";
     
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>"  . $row["f_id"]."</td><td>". $row["f_name"]. "</td><td>" . $row["f_price"]. "</td>";
         echo "<td><a href=deletefood.php?id=".$row["f_id"].">Delete</a></td><td><a href=updatefood.php?id=".$row["f_id"].">Update</a></td>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?>  <br><br><br><br><br><br><br>

    <footer>
        <a href="food.php">Food Details</a>
        <a href="addfood.php">Add Food</a>
        <a href="../public/restaurant.php">Restaurant</a>
    </footer>

 

<input type="submit" onclick="printDiv('printableArea')" value="print!" />
<div class="footer">


<script>
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}</script>

</body>
</html>
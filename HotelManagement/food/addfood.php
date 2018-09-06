<!DOCTYPE html>
<html>
<head>
    <title>Restaurant - Admin</title>
    <link rel="stylesheet" type="text/css" href="../public/style/css/style.css">
</head>

<body>

<form action="addconnect.php" method="post">

    <h1>Insert Food Details</h1>

    <input type="text" name="f_id" id="f_id" placeholder="Food Item Code">
    <br>

    <input type="text" name="f_name" id="f_name"  placeholder="Food Name">
    <br>
    <input type="text" name="f_price" id="f_price" placeholder="Food Price">
    <br>
    <br>
    <input type="submit" value="Submit">
    <input type="reset">
</form>


</body>
<footer>
    <a href="food.php">Food Details</a>
    <a href="addfood.php">Add Food</a>
    <a href="../public/restaurant.php">Restaurant</a>
</footer>

</html>
<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="res"; // Database name
$tbl_name="food"; // Table name

// Connect to server and select databse.
$link=mysqli_connect($host, $username, $password, $db_name)or die("cannot connect"); 

$sql="SELECT * FROM $tbl_name";
$result=mysqli_query($link,$sql);
//var_dump();
$count=$result->num_rows;
 
// Count table rows 
//$count=mysqli_num_rows($result);

if($_SERVER["REQUEST_METHOD"]==="POST"){
for($i=0;$i<$count;$i++){

    $a1 = $_POST["f_id$i"];
    $a2 = $_POST["f_name$i"];
    $a3 = $_POST["f_price$i"];
    

$sql1="UPDATE `food` SET `f_id`='$a1',`f_name`='$a2',`f_price`='$a3' WHERE `f_id`='$a1'";
//var_dump($sql1);
$result1=mysqli_query($link,$sql1);
}
}
$result=mysqli_query($link,$sql);
?>

<head>
    <title>Restaurant - Admin</title>
    <link rel="stylesheet" type="text/css" href="../public/style/css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head></head>

<table>

<form name="form1" method="post" action="#">



<tr>

<th align="center"><strong>Food Code</strong></th>
<th align="center"><strong>Food Name</strong></th>
<th align="center"><strong>Food Price</strong></th>
</tr>

<?php
$n=0;
//var_dump($result);
while($rows=mysqli_fetch_assoc($result)){
    
?>


<tr>
<td align="center">
<input name="f_id<?=$n?>" type="text"  value="<?=$rows['f_id']; ?>">
</td>
<td align="center">
<input name="f_name<?=$n?>" type="text"  value="<?=$rows['f_name']; ?>">
</td>
<td align="center">
<input name="f_price<?=$n?>" type="text"  value="<?=$rows['f_price']; ?>">
</td>

</tr>


<?php
$n++;
}
?>
</table>
<tr>
<td align="center"><input type="submit" name="submit" value="submit"></td>
</tr>




</td>
</tr>

</form>
<footer>
    <a href="food.php">Food Details</a>
    <a href="addfood.php">Add Food</a>
    <a href="../public/restaurant.php">Restaurant</a>
</footer>

<?php

// Check if button name "Submit" is active, do this 



?>
        
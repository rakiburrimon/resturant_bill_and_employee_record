<?php
$conn=mysqli_connect('127.0.0.1','root','');

mysqli_select_db($conn,'res');
$sql="DELETE FROM food WHERE f_id='$_GET[id]'";
if(mysqli_query($conn,$sql))
     header("refresh:1;url=viewfood.php");
else 
     echo"not deleted";
?>
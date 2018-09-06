<?PHP 

//  Define all the constants needed for database handling

define("HOST","localhost");
define("USER","root");
define("DB_NAME","res");
define("DB_PASS","");

$connection=mysqli_connect(HOST,USER,DB_PASS,DB_NAME);

?>
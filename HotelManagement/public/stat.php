<?PHP

require_once '../inc/db.php';

if(isset($_GET)){
	if(isset($_GET["bdate"])){
		$d = $_GET["bdate"];
		$db = new mysqli(HOST,USER,DB_PASS,DB_NAME);
		$qry = sprintf("SELECT id,username,food,bill,billdate FROM rest WHERE billdate = '%s'",$d);
		$res = $db->query($qry);
		$details = mysqli_fetch_all($res);
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Restaurant - Admin</title>
	<link rel="stylesheet" type="text/css" href="style/css/style.css">
</head>
<body>

	<header>
		<div class="header-wrap no-wrap">
			<div id="logo">
				restaurant
			</div>
		</div>
	</header>

	<section id="stat">
		<div class="section-wrap">
			
			<h3>Pick a date and get the bills of that day</h3>
			<form action="#" method="get" id="bill_details">
				<div class="ff">
					<label>
						Select a date
						<input type="date" name="bdate" onchange="get_bills(this);">
					</label>
				</div>
			</form>

			<?PHP 

				if(isset($_GET) && isset($details)){
					echo "<table cellspacing=\"0\" border=\"1\"><tr><th>Id</th><th>Username</th><th>Food</th><th>Bill</th><th>Bill date</th></tr>";
					foreach ($details as $key => $value) {
							echo "<tr>";
						foreach ($value as $key => $value) {
							echo "<td>".$value."</td>";
						}
						echo "</tr>";
					}
					echo "</table>";
				}

			?>
			<footer>
			<a href="index.php">Home</a>
			<a href="restaurant.php">Restaurant</a>
			</footer>
		</div>
	</section>

	<script type="text/javascript">
		function get_bills(e){
			document.getElementById("bill_details").submit();
		}
	</script>
</body>
</html>
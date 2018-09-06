<?PHP


	require_once "../inc/restaurant.php";

	//  Home page of teh whole website

	if(isset($_POST["rest_submit"])){
		$choosen = (isset($_POST["ufood"])) ? ($_POST["ufood"]) : [] ;
		$u_name = (isset($_POST["uname"])) ? ($_POST["uname"]) : "" ;
		$food_choosen = [];
		$bill = 0;
		foreach ($choosen as $key => $value) {
			$bill+=$value;
			array_push($food_choosen , $key);
		}
		$rest_c = new bill($bill,$food_choosen,$u_name);
		// if($rest_c->error == 1){
		// 	header("Location:".$_SERVER["PHP_SELF"]);
		// 	exit();
		// }
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Restaurant - Admin</title>
	<link rel="stylesheet" type="text/css" href="style/css/style.css">
    <link rel="stylesheet" type="text/css" href="../boot/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../boot/css/bootstrap-theme.css">
    <script src="../boot/js/jquery-3.2.1.min.js"></script>
    <script src="../boot/js/bootstrap.min.js"></script>

</head>
<body>

	<header>
		<div class="header-wrap no-wrap">
			<div id="logo">
				Restaurant
			</div>
		</div>
	</header>

	<section id="res">
		<div class="section-wrap">
			<div class="pg-img" style="background-image: url('style/img/food.jpg');background-repeat:no-repeat;background-position: top right;background-size: cover">
				<div class="float-pos">
					<a href="index.php">Go To Home</a>
				</div>
			</div>
			<div class="pg-content">
				<div class="pg-content-wrap">
					<h1 class="pg-content-title"> Restaurant </h1>
					<p>
						Restaurant at your service
					</p>
					<?PHP 

							if(isset($_POST["rest_submit"]) && isset($rest_c->msg)){
								echo "<div class=\"msg\">".$rest_c->msg.'</div>';
							}

						?>
					<div>
						<form method="post" action="#" >

							<div class="ff">
								<label>
									Customer name
									<input type="text" name="uname" placeholder="Customer name" >
								</label>
							</div>

							<div class="clr"></div>



                            <div class="col-sm-12">
                                <div class="form-group text-center">
                                    <button type="button" class="btn btn-warning" data-target="#member-details" data-toggle="modal">Add/Remove Food</button>
                                    <input type="hidden" name="memberList">
                                    <div id="family-list" class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                            <tr><th>Name</th><th>Price</th><th>Quantity</th><th>Amount</th></tr>
                                            </thead>
                                            <tbody id="family-list-table"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>




							<div class="ffs">
								<label>
									<button class="but1" type="button" onclick="cal_cost();">Check total cost</button>
								</label>
								<label>
									<div id="cost">Total bill: </div>
								</label>
							</div>
							<div class="clr"></div>
							<div class="ff">
								<button type="submit" name="rest_submit">Submit</button>
							</div>
						</form>
						<br><hr>
						<a href="stat.php">Check the bills</a>
					</div>
				</div>
			</div>
		</div>
	</section>




    <div class="modal fade" id="member-details" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Order Details</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group text-center">
                        <button id="add" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>
                        <label>Member</label>
                        <button id="remove" type="button" class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></button>
                        <br>
                        <div class="form-group">
                            <div class="form-inline">
                                <label class="label-default" style="width: 50%" >Name</label>
                                <label class="label-info" style="width: 20%" >Quantity</label>
                                <label class="label-primary" style="width: 25%" >Price</label>
                            </div>
                        </div>
                        <div id="family-div"></div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" id="relsave" class="btn btn-info">Okay</button>
                </div>
            </div>
        </div>
    </div>



    <div class="hide">
        <div class="ing">
            <div class="form-group">
                <div class="form-inline">
                    <select class="form-control rqun" style="width:50%" title="Food">
                        <option value="0">Select One</option>
                        <?php
                        include_once ("../inc/db.php");
                        $query="SELECT * FROM `food`";
                        var_dump($connection);
                        $result=mysqli_query($connection,$query);
                        while ($row=mysqli_fetch_assoc($result)){
                            echo "<option value='".$row["f_id"]."'>".$row["f_name"]."</option>";
                        }
                        ?>
                    </select>
                    <input class="form-control rqunt" type="number" style="width: 20%" placeholder="Quantity">
                    <input class="form-control rprice" type="text" style="width: 25%" disabled>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
	function cal_cost(){
		var cost=0;
		var vals = document.querySelectorAll('input[type="checkbox"]');
		for(var i=0;i<vals.length;i++){
			if(vals[i].checked){
				cost+=parseInt(vals[i].getAttribute("value")) * parseInt(vals[i].parentElement.children[1].value);
			}
		}
		var par = document.getElementById("cost");
		par.textContent="";
		par.textContent+= "Total bill "+cost+ " TK";
		par.style.display = "block";
	}


	function disp_food(e){
		var in_eles_par = document.querySelectorAll("#food_gallery_eles");
		var in_eles = in_eles_par[0].children.length;
		var in_val = parseInt(e.target.value);
		if(typeof in_val != undefined && in_val != 0){
			ele = document.getElementById("food_type_"+in_val);
			ele.style.display = "block";
		}

		for(var i=1;i<in_eles;i++){
			if(i!==in_val){
				ele = document.getElementById("food_type_"+i);
				ele.style.display = "none";
			}
		}

	}
</script>


    <script>
        $(document).ready(function () {
            var con = 1;
            $('#add').click(function () {
                $('#family-div').prepend("<div id='divfam" + con + "'><div class='text-center'>" + $(".ing").html() + "</div></div>");
                con++;
            });
            $('#remove').click(function () {
                if (con > 1) {
                    $("#divfam" + con).remove();
                    con--;
                } else if (con === 1) {
                    $("#divfam" + con).remove();
                }
            });
            $('#relsave').click(function () {
                var n = 0;
                var iarray = [];
                $("#family-list-table").html("");
                $("#family-div").children("div").each(function () {
                    var parnt = $(this).attr("id");
                    var fname = $("#" + parnt).find(".rfname").val();
                    var lname = $("#" + parnt).find(".rlname").val();
                    var rel = $("#" + parnt).find(".rrel").val();
                    var dob = $("#" + parnt).find(".rdob").val();
                    var data = {"fname": fname, "lname": lname, "rel": rel, "dob": dob};
                    iarray.push(data);
                    $("#family-list-table").append("<tr><td>" + fname + "</td><td>" + lname + "</td><td>" + $("#" + parnt).find(".rrel option:selected").text() + "</td><td>" + dob + "</td><tr>");
                    n++;
                });
                var io = JSON.stringify(iarray);
                $("input[name=memberList]").val(io);
                $("#member-details").modal("toggle");
            });
        });
    </script>
</body>
</html>
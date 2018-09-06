<?PHP


require_once "../inc/db.php";

class bill{

	var $error = 1;

	function __construct( $cost , $food_list , $name){

		$food = implode(',',$food_list);
		$food = str_replace("'","",$food);
		$this->pay_bill($cost , $food, $name);

	}

	private function pay_bill($cost , $food , $uname){
		if(isset($cost) && $cost != 0 && !empty($food)){
			//  generating a hash for the id when everytime a new bill is generated
			$uid = sha1(time()."res");



			$db = new mysqli(HOST,USER,DB_PASS,DB_NAME);

			$qry = sprintf("INSERT INTO rest (id,username,food,bill,billdate,billtime) VALUES('%s','%s','%s','%f',CURRENT_DATE,CURRENT_TIME)",$uid,$uname,$food,$cost);

			if($db->query($qry)){
				$this->error = 0;
				$this->msg = "Bill successfully added";
				return;
			}else{
				$this->error = 1;
				$this->msg = "Bill not added";
				return;
			}

		}else{
			$this->error = 1;
			$this->msg = "All fields are necessary";
			return;
		}
	}

}


?>
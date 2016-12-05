<?php
	//include this file where database access is needed

	//setup database as follows:
	// database name: underwoodco
	// table inventory: varchar size*, int quantity
	// table econ: varchar size*, float val
	// *primary key; must be set for update functions to work correctly

	// change password here if needed
	$password= "joseph210";

	//sample of functions.
	// updateEcon(5,5,120,30);
	// updateEcon(3,5,120,20);
	//
	// updateInventory(10,5,5,120);
	// updateInventory(10,3,5,120);

	$update= checkInventory();

	// echo "<pre>";
	// print_r($update);
	// echo "<pre>";

	//updates the economic variables table
	//call this function for each line read from the economic variables text file
	function updateEcon($hgt, $wid, $len, $val){
		global $password;
		$con= mysqli_connect("localhost","root",$password,"underwoodco");
		if(mysqli_connect_errno()){ echo "Failed to connect to database ".mysqli_connect_error(); }
		else{
			//sets 'size' variable to HEIGHTxWIDTHxLENGTH format if non-zero values are passed, or to scrap otherwise
			if($hgt == 0 || $wid == 0 || $len == 0){ $str= "scrap"; }
			else{ $str= intval($hgt)."x".intval($wid)."x".intval($len); }

			//sets sql command for INSERT or UPDATE
			$sql= "INSERT INTO econ (size, val) VALUES ('".$str."', ".$val.") ON DUPLICATE KEY UPDATE val=".$val;

			if(mysqli_query($con,$sql) == false){ echo mysqli_error($con)."<br>"; }
			mysqli_close($con);
		}
	}
	//updates the inventory table
	//call this function each time the inventory is updated
	//set $quan to the amount that is to be entered into the inventory
	//use a negative value when removing from the inventory
	function updateInventory($quan, $hgt, $wid, $len){
		global $password;
		$con= mysqli_connect("localhost","root",$password,"underwoodco");
		if(mysqli_connect_errno()){ echo "Failed to connect to database ".mysqli_connect_error(); }
		else{
			//sets 'size' variable to HEIGHTxWIDTHxLENGTH format if non-zero values are passed, or to scrap otherwise
			if($hgt == 0 || $wid == 0 || $len == 0){ $str= "scrap"; }
			else{ $str= intval($hgt)."x".intval($wid)."x".intval($len); }

			//sets sql command for INSERT or UPDATE
			$sql= "INSERT INTO inventory (quantity, size) VALUES (".$quan.", '".$str."') ON DUPLICATE KEY UPDATE quantity= quantity+".$quan;

			if(mysqli_query($con,$sql) == false){ echo mysqli_error($con)."<br>"; }
			mysqli_close($con);
		}
	}
	//queries Inventory and Econ tables in database, then returns result in an array
	//each element is an array with this format:
	//	[quantity]=>quantity in inventory
	//	[size]=>string  ex."1x2x10"
	//	[val]=>value of one unit
	//	[valSum]=>value of all units
	//	[hgt]=>height
	//	[wid]=>width
	//	[len]=>length
	function checkInventory(){
		global $password;
		$con= mysqli_connect("localhost","root",$password,"underwoodco");
		if(mysqli_connect_errno()){ echo "Failed to connect to database ".mysqli_connect_error(); }
		else{
			$sql= "SELECT inventory.*, econ.val, inventory.quantity*Econ.val AS valSum FROM inventory RIGHT JOIN econ ON inventory.size = econ.size;";
			$result= $con->query($sql);
			$inventory= array();

			if(mysqli_query($con,$sql) == false){ echo mysqli_error($con)."<br>"; }
			else{
				if($result->num_rows > 0){
					while($row= $result->fetch_assoc()){
						if($row["size"] != "scrap"){
							$size= explode("x",$row["size"]);
							$row["hgt"]= intval($size[0]);
							$row["wid"]= intval($size[1]);
							$row["len"]= intval($size[2]);
						}
						$inventory[]= $row;
					}
				}
			}
			return $inventory;
		}
	}
?>

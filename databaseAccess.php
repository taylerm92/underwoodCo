<?php
	$db;
	$con= mysqli_connect("localhost","root","","google_maps");
	if(mysqli_connect_errno()){ echo "Failed to connect to database ".mysqli_connect_error(); }
	else{
		
	}

	//updates the economic variables table
	//call this function for each line read from the economic variables text file
	function updateEcon($hgt, $wid, $len, $val){
		global $dbName, $db;
		if(file_exists($dbName)){
			//sets 'size' variable to HEIGHTxWIDTHxLENGTH format if non-zero values are passed, or to scrap otherwise
			if($hgt == 0 || $wid == 0 || $len == 0){ $str= "scrap"; }
			else{ $str= $hgt."x".$wid."x".$len; }
		
			//checks if row already exists in table
			$sql= "SELECT COUNT(*) FROM Econ WHERE size='".$str."'";
			$query= $db->query($sql);
		
			//sets sql command for INSERT or UPDATE
			if($query->fetchColumn() <= 0){ $sql= "INSERT INTO Econ (size, val) VALUES ('".$str."', ".$val.")"; }
			else{ $sql= "UPDATE Econ SET val= ".$val." WHERE size='".$str."'"; }
		
			if($db->query($sql)){ echo "success<br>"; }
			else{
				$db_err = $db->errorInfo();
				echo "Error : (". $db_err[0] .") -- " . $db_err[2];
			}
		}
	}
	//updates the inventory table
	//call this function each time the inventory is updated
	//set $quan to the amount that is to be entered into the inventory
	//use a negative value when removing from the inventory
	function updateInventory($quan, $hgt, $wid, $len){
		global $dbName, $db;
		if(file_exists($dbName)){
			//sets 'size' variable to HEIGHTxWIDTHxLENGTH format if non-zero values are passed, or to scrap otherwise
			if($hgt == 0 || $wid == 0 || $len == 0){ $str= "scrap"; }
			else{ $str= $hgt."x".$wid."x".$len; }
		
			//checks if row already exists in table
			$sql= "SELECT COUNT(*) FROM Inventory WHERE size='".$str."'";
			$query= $db->query($sql);
		
			//sets sql command for INSERT or UPDATE
			if($query->fetchColumn() <= 0){ $sql= "INSERT INTO Inventory (quantity, size) VALUES (".$quan.", '".$str."')"; }
			else{ $sql= "UPDATE Inventory SET quantity= quantity+".$quan." WHERE size='".$str."'"; }
		
			if($db->query($sql)){ echo "success<br>"; }
			else{
				$db_err= $db->errorInfo();
				echo "Error : (". $db_err[0] .") -- " . $db_err[2];
			}
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
		global $dbName, $db;
		if(file_exists($dbName)){
			$sql= "SELECT Inventory.*, Econ.val, [Inventory.quantity]*[Econ.val] AS valSum FROM Inventory RIGHT JOIN Econ ON Inventory.size = Econ.size;";
			$query= $db->query($sql);
			
			$query= $query->fetchAll(PDO::FETCH_ASSOC);
			
			foreach($query as &$row){
				if($row["size"] != "scrap"){
					$size= explode("x",$row["size"]);
					$row["hgt"]= intval($size[0]);
					$row["wid"]= intval($size[1]);
					$row["len"]= intval($size[2]);
				}
			}
			return $query;
		}
	}
?>
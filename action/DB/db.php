<?php 
	class Database
	{
		private $username = "root";
		private $password = "";
		private $servername = "localhost";
		private $dbname = "cooking";
		private $co;

		private function open() {
			$this->co = new mysqli( $this->servername,$this->username,$this->password,$this->dbname);		
		}

		private function close() {
			$this->co->close();
		}

		public function findRecipe($inputName) {
				try {
					$recipeTab = array();
					$this->open();
					// query
					$query ="SELECT * FROM recipe WHERE name LIKE ?;";
					//$extractFirstLetter = substr($inputName,0,1) . "%";
					$stmt = $this->co->prepare($query);
					$stmt->bind_param("s",$inputName);
					//$stmt->bind_param("s",$extractFirstLetter);
					$stmt->execute();
					$stmt->bind_result($id,$name,$img,$country);
					$r = $stmt->get_result();
					while($row = $r->fetch_array(MYSQLI_ASSOC)) {
						array_push($recipeTab, $row);
					}
					$this->close();

					return $recipeTab;

				} catch (Exception $e) {
					throw $e;
				}
				
		}
	}
?>
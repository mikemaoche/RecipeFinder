<?php 
	class Database
	{
		private $username = "root";
		private $password = "";
		private $servername = "localhost";
		private $dbname = "cooking";
		private $co;

		private function open() {
			mysqli_report(MYSQLI_REPORT_ALL); // get better understanding of return false from prepare
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
					$query ="SELECT * FROM recipe WHERE recipe_name LIKE ?;";
					//$extractFirstLetter = substr($inputName,0,1) . "%";
					$stmt = $this->co->prepare($query);
					$stmt->bind_param("s",$inputName);
					//$stmt->bind_param("s",$extractFirstLetter);
					$stmt->execute();
					$stmt->bind_result($id,$name, $img,$country);
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

		public function addRecipe($data){
			try{
				extract($data); // destructuring data
				$this->open();
				// recipe table
				$sql = $this->co->prepare("INSERT INTO recipe(recipe_name,img_path,country) VALUES(?,?,?)");
				$sql->bind_param('sss', $name,$image,$country);
				$sql->execute();

				// detail table
				$last_id = mysqli_insert_id($this->co);
				$sql = $this->co->prepare("INSERT INTO detail(ingredient,step,duration,recipeID) VALUES(?,?,?,?)");
				$sql->bind_param('sssd', $ingredient,$step,$duration,$last_id);
				$sql->execute();
				$this->close();
				echo 'successful added!';

			} catch(Exception $error){
				throw $error;
			}
		}
	}
?>
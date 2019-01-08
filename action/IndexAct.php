<?php 
	require_once("DB/db.php");
	session_start();

	
	class IndexAct
	{
		private $r;

		public function run() {
			if(!empty($_GET["search"])){
				$statm = $_GET["recipe"];
				$this->findRecipe($statm);		
			}

		}

		public function findRecipe($name) {
			$db = new Database();
			$this->r = $db->findRecipe($name);
			
		}

		public function getResult() {
			return $this->r;
		}
	}
	
?>
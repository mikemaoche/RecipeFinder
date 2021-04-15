<?php

    require_once("DB/db.php");
    session_start();
    class AddAction {
        private $result;

        public function doFieldsExist(){
            if(!isset($_POST["name"])) return false;
            if(!isset($_POST["country"])) return false;
            if(!isset($_POST["ingredient"])) return false;
            if(!isset($_POST["step"])) return false;
            if(!isset($_POST["duration"])) return false;
            if(!isset($_FILES["fileToUpload"])) return false;
            return true;
        }

        public function areFieldsFilled(){
            if(!empty($_POST["name"]) && !empty($_POST["country"]) && !empty($_POST["ingredient"])) return true;
            return false;
        }
        
		public function addRecipe() {
            $db = new Database();

            if(!$this->doFieldsExist()) echo 'It does not exist';
            else{
                if($this->areFieldsFilled()){
                    $data = [ 
                        'name' =>  $_POST["name"] ,
                        'country' => $_POST["country"],
                        'ingredient' => $_POST["ingredient"],
                        'step' => $_POST["step"],
                        'duration' => $_POST["duration"],
                        'image' => $_FILES['fileToUpload']['name']
                    ];
                    // $target='img/'.basename($_FILES['fileToUpload']['name']);
                     echo fopen($_FILES["fileToUpload"]["tmp_name"], 'r');
                    $this->result = $db->addRecipe($data);
                }
            }


			
		}
    }

    $add = new AddAction;
    $add->addRecipe();

?>
<?php
class Equipe {

        private $id;
        private $nom;

        public function __construct(){
                
        }

        public function initFromDb($data){

                $this->id = $data["PK_equipe"];

                $this->nom = $data["Nom"];

        }

        public function getId(){

                return $this->id;

        }
        public function getNom(){

                return $this->nom;

        }
}
?>
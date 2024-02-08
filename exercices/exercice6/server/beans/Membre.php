<?php
class Membre{

        private $nom;
        private $age;

        public function __construct(string $nom, int $age){

                $this->nom = $nom;
                $this->age = $age;

        }
        public function getNom(){

                return $this->nom;

        }
        public function getAge(){

                return $this->age;

        }
}
?>
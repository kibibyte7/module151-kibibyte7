<?php

class Joueur {
    
    private $id;
    private $nom;
    private $FK_equipe;
    private $points;


    public function __construct() {

    }

    public function initFromDb($data) {
        $this->id = $data['PK_joueur'];
        $this->nom = $data['Nom'];
        $this->FK_equipe = $data['FK_equipe'];
        $this->points = $data['Points'];
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getFKEquipe() {
        return $this->FK_equipe;
    }

    public function getPoints() {
        return $this->points;
    }


}

?>
<?php
include_once('beans/Membre.php');

class MembreWrk {

    function getMembres(){

        $membre = new Membre("paul", 51);
        $membre = array("nom" => $membre->getNom(), "age" => $membre->getAge());

        $membre1 = new Membre("Maxime", 20);
        $membre1 = array("nom" => $membre1->getNom(), "age"=> $membre1->getAge());
        
        $res = array();

        array_push($res, $membre);
        array_push($res, $membre1);

        return $res;
    }

}

?>
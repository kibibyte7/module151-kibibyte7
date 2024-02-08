<?php
include_once('beans/Equipe.php');
include_once('connexion/Connexion.php');

class EquipeWrk {

    function getEquipes(){

        //Requete
        $requete = "SELECT * FROM t_equipe";

        //Prendre la connexion
        $connexion = Connexion::getInstance();

        //Définir un array vide pour les paramètres vu que j'en ai pas besoin
        $params = array();

        //Executer la requete
        $res = $connexion->SelectQuery($requete, $params);

        //Préparer la réponse
        $response = array();
        
        //Définir l'index
        $i = 0;

        //Parcourir la liste des résultats
        foreach($res as $data){

            //Créer l'objet équipe vide pour l'instant
            $equipe = new Equipe();

            //Prendre tout et le mettre dans l'objet équipes
            $equipe->initFromDb($data);
            
            //Mettre en forme la réponse avec ce que l'on veut envoyer
            $response[$i] = [
                'PK_equipe' => $equipe->getId(),
                'Nom' => $equipe->getNom()
            ];

            //Incrémenter i
            $i++;
        }
        
        //Donner la réponse
        return $response;
    }

}

?>
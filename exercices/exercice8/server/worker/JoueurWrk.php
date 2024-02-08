<?php
include_once('beans/Joueur.php');
include_once('connexion/Connexion.php');

class JoueurWrk {

    function getJoueurs(){

        //Je crée ma requête
        $requete = "SELECT * FROM t_joueur";

        //Je prends ma connexion
        $connexion = Connexion::getInstance();

        //Je met des paramètres vides
        $params = array();

        //j'éxecute la requête
        $res = $connexion->SelectQuery($requete, $params);

        //Je crée le tableau de la réponse
        $response = array();
        
        //Je défini mon index
        $i = 0;

        //Je parcours ma liste de résultats
        foreach($res as $data){

            //Je crée l'objet du joueur vide pour l'instant
            $joueur = new Joueur();

            //Je l'initialise directement avec les data reçues
            $joueur->initFromDb($data);
            
            //Je crée ma réponse avec ce que je veux envoyer
            $response[$i] = [
                'PK_joueur' => $joueur->getId(),
                'Nom' => $joueur->getNom(),
                'Points' => $joueur->getPoints()
            ];

            //J'incrémente l'index
            $i++;
        }
        
        //Je retourne la réponse
        return $response;
    }

    function getJoueursParEquipe($FK_equipe){

        //Je prépare ma requête
        $requete = "SELECT * FROM t_joueur WHERE FK_equipe = :FK_equipe";

        //Je prends la connexion
        $connexion = Connexion::getInstance();

        //Je met la FK_equipe dans mes paramètres
        $params = array("FK_equipe" => $FK_equipe);

        //J'éxecute ma requête
        $res = $connexion->SelectQuery($requete, $params);

        //Je crée le tableau dea réponses
        $response = array();
        
        //Je défini l'index
        $i = 0;

        //Je parcours la liste de résultats
        foreach($res as $data){

            //Je crée l'objet joueur
            $joueur = new Joueur();

            //Je pousse les données dans l'objet
            $joueur->initFromDb($data);
            
            //Je crée ma réponse avec ce que je veux envoyer
            $response[$i] = [
                'PK_joueur' => $joueur->getId(),
                'Nom' => $joueur->getNom(),
                'Points' => $joueur->getPoints()
            ];

            //J'incrémente mon index
            $i++;
        }
        
        //Je donne la réponse
        return $response;
    }
}

?>
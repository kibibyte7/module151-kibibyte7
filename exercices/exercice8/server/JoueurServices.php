<?php
include_once('ctrl/JoueurCtrl.php');

//Je prend la méthode de la requête reçue
$methode = $_SERVER['REQUEST_METHOD'];

//Je regarde quelle méthode est utilisée 
switch ($methode) {
    case 'GET':

        //Je crée mon contrôleur
        $ctrl = new JoueurCtrl();

        //S'il y a un paramètre équipe
        if(isset($_GET['FK_equipe'])){

            //Je donne la réponse reçue de manière standardisée
            echo $ctrl->getJoueursParEquipe($_GET['FK_equipe']);

        } else {

            //Je donne la réponse reçue de manière standardisée
            echo $ctrl->getJoueurs();

        }
        break;
    case 'POST':
        http_response_code(NOT_IMPLEMENTED);
        echo writeJSONResponse(NOT_IMPLEMENTED, "Pas implémentée pour le moment", null);
        break;
    case 'PUT':
        http_response_code(NOT_IMPLEMENTED);
        echo writeJSONResponse(NOT_IMPLEMENTED, "Pas implémentée pour le moment", null);
        break;
    case 'DELETE':
        http_response_code(NOT_IMPLEMENTED);
        echo writeJSONResponse(NOT_IMPLEMENTED, "Pas implémentée pour le moment", null);
        break;
    default:
        http_response_code(BAD_REQUEST);
    }
?>
<?php
include_once('ctrl/EquipeCtrl.php');

//Je prends la méthode utilisée par le client
$methode = $_SERVER['REQUEST_METHOD'];

//Je regarde la méthode utilisée
switch ($methode) {
    case 'GET':

        //Je crée mon contrôleur
        $ctrl = new EquipeCtrl();

        //Je donne la réponse reçue de manière standardisée
        echo $ctrl->getEquipes();
        
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
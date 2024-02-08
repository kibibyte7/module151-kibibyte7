<?php
include_once('ctrl/MembreCtrl.php');
include_once('constantes/Constantes.php');
include_once('tools/common.php');

$methode = $_SERVER['REQUEST_METHOD'];

switch ($methode) {
    case 'GET':
        $ctrl = new MembreCtrl();
        echo writeJSONResponse(OK, 'Membre retourné' , $ctrl->getMembres());
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
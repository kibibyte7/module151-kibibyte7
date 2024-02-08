<?php
include_once 'constantes/Constantes.php';

/**
 * Génère une réponse JSON formatée avec un code de statut, un message et des données.
 *
 * @param mixed $code Le code de statut HTTP de la réponse.
 * @param mixed $message Le message associé à la réponse.
 * @param mixed $data Les données à inclure dans le corps de la réponse.
 *
 * @return string La réponse JSON générée.
 */
function writeJSONResponse($code, $message, $data){

    // Définit l'en-tête Content-Type pour indiquer que la réponse est en JSON avec l'encodage UTF-8
    header('Content-Type: application/json; charset=utf-8');

    // Encode les données en JSON, en conservant les caractères Unicode non échappés
    $json = json_encode(array("code" => $code, "message" => $message, "body" => $data), JSON_UNESCAPED_UNICODE);

    // Gestion de l'erreur d'encodage JSON
    if ($json === false) {

        //Prendre des infos supplémentaires sur l'erreur d'encodage
        $jsonError = json_last_error_msg();

        // Génère une réponse d'erreur avec le code 500 Internal Server Error en cas d'échec d'encodage JSON
        $json = json_encode(
            array(
                "code" => INTERNAL_SERVER_ERROR,
                "message" => "Erreur lors de l'encodage en JSON : " . $jsonError,
                "body" => array()
            ), JSON_UNESCAPED_UNICODE);
    }

    // Retourne la réponse JSON générée
    return $json;
}

?>
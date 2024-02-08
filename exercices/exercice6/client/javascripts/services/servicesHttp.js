/*
 * Couche de services HTTP (worker).
 *
 * @author Olivier Neuhaus
 * @version 1.0 / 20-SEP-2013
 */

var BASE_URL = "http://localhost:8080/server/";

let servicesHttp = () => {

    /**
 * Fonction permettant de charger les données d'équipe.
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
    function _chargerMembres(successCallback, errorCallback) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: BASE_URL + "MembreServices.php",
            success: successCallback,
            error: errorCallback
        });
    }

};

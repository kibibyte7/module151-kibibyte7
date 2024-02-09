/*
 * Couche de services HTTP (worker).
 *
 * @author Olivier Neuhaus
 * @version 1.0 / 20-SEP-2013
 */

var BASE_URL = "http://localhost";

/**
 * Fonction permettant de charger les données d'équipe.
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function chargerTeam(successCallback, errorCallback) {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: `${BASE_URL}/EquipesServices.php`,
        success: successCallback,
        error: errorCallback
    });
}


/**
 * Fonction permettant de charger les données d'équipe.
 * @param {type} teamid, id de l'équipe dans laquelle trouver les joueurs
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function chargerPlayers(teamid, successCallback, errorCallback) {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: `${BASE_URL}/JoueurServices.php?FK_equipe=${teamid}`,
        success: successCallback,
        error: errorCallback
    });
}
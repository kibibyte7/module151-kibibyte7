<?php
include_once('constantes/Constantes.php');
include_once('tools/common.php');
include_once('worker/JoueurWrk.php');

class JoueurCtrl {

    function getJoueurs(){

        $wrk = new JoueurWrk();

        return writeJSONResponse(OK, "Joueurs retournés", $wrk->getJoueurs());
        
    }

    function getJoueursParEquipe($FK_equipe){

        $wrk = new JoueurWrk();

        return writeJSONResponse(OK, "Joueurs retournés", $wrk->getJoueursParEquipe($FK_equipe));
    }

}

?>
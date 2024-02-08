<?php
include_once('constantes/Constantes.php');
include_once('tools/common.php');
include_once('worker/EquipeWrk.php');

class EquipeCtrl {

    function getEquipes(){

        //Je crée mon worker
        $wrk = new EquipeWrk();

        //je lui demande de prendre les équipes
        return  writeJSONResponse(OK, 'Equipes retourné' , $wrk->getEquipes());
    }

}


?>
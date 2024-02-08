<?php
include_once('worker/MembreWrk.php');

class MembreCtrl{

    function getMembres(){
        $wrk = new MembreWrk();
        return $wrk->getMembres();
    }

}


?>
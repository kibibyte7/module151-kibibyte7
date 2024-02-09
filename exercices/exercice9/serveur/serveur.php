<?php
include_once 'constantes/constantes.php';
include_once 'tools/common.php';

header('Access-Control-Allow-Origin: http://localhost:3000');
header('Access-Control-Allow-Credentials: true');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	switch($_POST['action']){

		case "connect":
			
			if(isset($_POST['password'])){

				if($_POST['password'] == "emf"){

					$_SESSION["logged"] = "emf";

					$res = writeJSONResponse(OK, "Connexion réussie", array());

				} else {

					if(isset($_SESSION)){

						unset($_SESSION);

					}

					$res = writeJSONResponse(UNAUTHORIZED, "Le mot de passe ne correspond pas à 'emf'", array());

				}

			}

			echo $res;
		break;

		case "disconnect":

			if(isset($_SESSION)){
						
				unset($_SESSION);

			}

			session_destroy();

			$res = writeJSONResponse(OK, "Déconnexion réussie", array());

			echo $res;
		break;
	}
}

if ($_SERVER['REQUEST_METHOD'] == 'GET'){

	$res = -1;

	if($_GET['action'] == "getInfos"){

		if(isset($_SESSION["logged"])){

			// tout d'abord contrôler que la variable de session 'logged' contient bien "emf"
			if($_SESSION["logged"] == "emf"){

				$result = [
					[
						'name' => 'Victor Legros',
						'salaire' => 9876,
					],
					[
						'name' => 'Marinette Lachance',
						'salaire' => 7540,
					],
					[
						'name' => 'Gustave Latuile',
						'salaire' => 4369,
					],
					[
						'name' => 'Basile Ledisciple',
						'salaire' => 2384,
					]
				];

				$res = writeJSONResponse(OK, "Utilisateurs retournés", $result);

			} else {

				$res = writeJSONResponse(UNAUTHORIZED, "Droits insuffisants", array());

			}
		
		} else {

			$res = writeJSONResponse(UNAUTHORIZED, "Non connecté", array());

		}
		
		echo $res;
	}
}

?>
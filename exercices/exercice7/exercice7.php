<?php
	$bdd = new PDO('mysql:host=localhost;dbname=nomDB', 'root', 'pwd');
	$result = [];
	$requete = 'select pk_jeux_video, titre from jeux_video';

	$query = $bdd->query($requete);

	$i = 0;

	while ($row = $query->fetch()) {
	
		$result[$i] = [
			'titre' => $row['titre'], 
			'pk_jeux_video' => $row['pk_jeux_video']
		];

		$i++;

	}
	
	$result->closeCursor();
?>

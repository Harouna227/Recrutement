<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		try{
$debu=strtotime($_POST['date_debut']);
$fin=strtotime($_POST['date_fin']);


		 $minutes = floor(($fin - $debu) / 60);
			$hours = floor($minutes / 60);
			$min = $minutes - ($hours * 60);
			$nombre_heure =$hours.".".$min;
			$stmt = $db->prepare("INSERT INTO tache_collaborateur (tache_id,collaborateur_id, date_debut, date_fin, nombre_heure) VALUES (:tache_id, :collaborateur_id, :date_debut, :date_fin, :nombre_heure)");
			$_SESSION['message'] = ( $stmt->execute(array(':tache_id' => $_POST['tache_id'],':collaborateur_id' => $_POST['collaborateur_id'],':date_debut' => $_POST['date_debut'],':date_fin' => $_POST['date_fin'],':nombre_heure' => $nombre_heure)) ) ? 'Ajouter avec success' : 'ya probleme';	
	    
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		$database->close();
	}

	else{
		$_SESSION['message'] = 'Remplir tout les champs';
	}

	header('location: index.php');
	
?>
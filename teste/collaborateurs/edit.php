<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$poste = $_POST['poste'];
			$departement_id = $_POST['departement_id'];

			$sql = "UPDATE collaborateurs SET nom = '$nom', prenom = '$prenom' , poste = '$poste',  departement_id = '$departement_id' WHERE id = '$id'";
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Modifier avec success' : 'ya probleme';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Modifier les champs';
	}

	header('location: index.php');

?>
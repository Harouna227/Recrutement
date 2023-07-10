<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$libelle = $_POST['libelle'];
			$commentaires = $_POST['commentaires'];

			$sql = "UPDATE taches SET libelle = '$libelle', commentaires = '$commentaires' WHERE id = '$id'";
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
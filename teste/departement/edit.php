<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$libelle = $_POST['libelle'];

			$sql = "UPDATE departement SET libelle = '$libelle' WHERE id = '$id'";
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
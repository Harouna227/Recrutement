<?php
	session_start();
	include_once('connection.php');

	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM departement WHERE id = '".$_GET['id']."'";
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'departement supprimer avec success' : 'y a probleme';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//close connection
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Selectionner le membre a supprimer';
	}

	header('location: index.php');

?>
<?php
	session_start();
	include_once('connection.php');

	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM tache_collaborateur WHERE id = '".$_GET['id']."'";
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'supprimer avec success' : 'y a probleme';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//close connection
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Selectionne ce que vous allez supprimer';
	}

	header('location: index.php');

?>
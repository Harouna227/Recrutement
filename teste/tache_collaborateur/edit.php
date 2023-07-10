<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$tache_id = $_POST['tache_id'];
			$collaborateur_id = $_POST['collaborateur_id'];

			$sql = "UPDATE tache_collaborateur SET tache_id = '$tache_id', collaborateur_id = '$collaborateur_id' WHERE id = '$id'";
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
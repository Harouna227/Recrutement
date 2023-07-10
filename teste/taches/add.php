<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO taches (libelle,commentaires) VALUES (:libelle, :commentaires)");
			$_SESSION['message'] = ( $stmt->execute(array(':libelle' => $_POST['libelle'],':commentaires' => $_POST['commentaires'])) ) ? 'Ajouter avec success' : 'ya probleme';	
	    
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//close connection
		$database->close();
	}

	else{
		$_SESSION['message'] = 'Remplir tout les champs';
	}

	header('location: index.php');
	
?>
<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO collaborateurs (nom,prenom,poste,departement_id) VALUES (:nom, :prenom, :poste, :departement_id)");
			$_SESSION['message'] = ( $stmt->execute(array(':nom' => $_POST['nom'],':prenom' => $_POST['prenom'],':poste' => $_POST['poste'],':departement_id' => $_POST['departement_id'])) ) ? 'Ajouter avec success' : 'ya probleme';	
	    
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
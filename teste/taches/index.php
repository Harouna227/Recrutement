<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Tâches</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../partiels/style.css">
</head>

<body>
	<?php include_once '../partiels/entete.php';?>
	<div class="container">
	<?php
$minutes = 125;

$hours = floor($minutes / 60);
$min = $minutes - ($hours * 60);

echo $hours.".".$min;
?>
		<h1 class="page-header text-center">Tâches CRUD </h1>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<a href="#addnew" class="btn btn-primary" data-toggle="modal"><span
						class="glyphicon glyphicon-plus"></span> Ajouter</a>
				<?php 
                session_start();
                if(isset($_SESSION['message'])){
                    ?>
				<div class="alert alert-info text-center" style="margin-top:20px;">
					<?php echo $_SESSION['message']; ?>
				</div>
				<?php

                    unset($_SESSION['message']);
                }
            ?>
				<table class="table table-bordered table-striped" style="margin-top:20px;">
					<thead>
						<th>ID</th>
						<th>Libelle</th>
						<th>Commentaires</th>
						<th>Action</th>
					</thead>
					<tbody>
						<?php
						include_once('connection.php');

						$database = new Connection();
    					$db = $database->open();
						try{	
						    $sql = 'SELECT * FROM taches';
						    foreach ($db->query($sql) as $row) {
						    	?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['libelle']; ?></td>
							<td><?php echo $row['commentaires']; ?></td>
							<td>
								<a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm"
									data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Modifier</a>
								<a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"
									data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Supprimer</a>
							</td>
							<?php include('edit_delete_modal.php'); ?>
						</tr>
						<?php 
						    }
						}
						catch(PDOException $e){
							echo "pas de probleme de connection: " . $e->getMessage();
						}

						$database->close();

					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php include_once '../partiels/footer.php'; ?>
	<?php include('add_modal.php'); ?>
	<script src="../js/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php
require_once 'connection.php';
$database = new Connection();
		$db = $database->open();
$selection1=$db->prepare("select * from taches");
$selection1->execute();
$afficher=$selection1->fetchall();

$selection2=$db->prepare("select * from collaborateurs");
$selection2->execute();
$afficher2=$selection2->fetchall();

?>
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Ajouter</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="add.php">

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Tâches:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="form-control" name="tache_id">
                                    <?php  foreach ($afficher as $aff):?>
                                    <option value="<?php echo $aff['id']?>"><?php echo $aff['libelle']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <label class="control-label"
                                        style="position:relative; top:7px;">Collaborateurs:</label>
                                </div>
                                <div class="col-sm-10">
                                    <select class="form-control" name="collaborateur_id">
                                        <?php  foreach ($afficher2 as $aff2):?>
                                        <option value="<?php echo $aff2['id']?>"><?php echo $aff2['nom']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Date de début:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="datetime-local" class="form-control" name="date_debut">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Date de fin:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="datetime-local" class="form-control" name="date_fin">
                            </div>
                        </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                        class="glyphicon glyphicon-remove"></span> Annuler</button>
                                <button type="submit" name="add" class="btn btn-primary"><span
                                        class="glyphicon glyphicon-floppy-disk"></span> Enregistrer</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
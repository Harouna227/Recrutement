<?php
require_once 'connection.php';
$database = new Connection();
		$db = $database->open();
$se=$db->prepare("select * from departement");
$se->execute();
$afficher=$se->fetchall();

?>
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Modifier Collaborateurs</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="edit.php?id=<?php echo $row['id']; ?>">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Nom:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nom" value="<?php echo $row['nom']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Prenom:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="prenom"
                                    value="<?php echo $row['prenom']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Poste:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="poste" value="<?php echo $row['poste']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Département:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="form-control" name="departement_id">
                                <?php  foreach ($afficher as $aff):?>
                                    <option  value="<?php echo $aff['id']?>"><?php echo $aff['libelle']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><span
                    class="glyphicon glyphicon-remove"></span> Annuler</button>
            <button type="submit" name="edit" class="btn btn-success"><span
                    class="glyphicon glyphicon-check"></span>Mettre a jour</a>
                </form>
        </div>

    </div>
</div>
</div>

<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Supprimer Collaborateurs</h4>
                </center>
            </div>
            <div class="modal-body">
                <p class="text-center">Etes vous sur de supprimer ??</p>
                <h2 class="text-center"><?php echo $row['nom'];?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span
                        class="glyphicon glyphicon-remove"></span> annuler</button>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span
                        class="glyphicon glyphicon-trash"></span> oui</a>
            </div>

        </div>
    </div>
</div>
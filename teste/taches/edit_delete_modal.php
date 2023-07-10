<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Modifier Tâche</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="edit.php?id=<?php echo $row['id']; ?>">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Libelle:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="libelle"
                                    value="<?php echo $row['libelle']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Commentaires:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="commentaires"
                                    value="<?php echo $row['commentaires']; ?>">
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
                    <h4 class="modal-title" id="myModalLabel">Supprimer tâche</h4>
                </center>
            </div>
            <div class="modal-body">
                <p class="text-center">Etes vous sur de supprimer ??</p>
                <h2 class="text-center"><?php echo $row['libelle'];?></h2>
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
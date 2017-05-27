<?php include "../template/header.php"; ?>
<?php
if ($_SESSION["tipo_usuario"] == 1) {
    ?>
    <div class="container">
        <div class="col-sm-4">

            <form name="cadastroEstampa" action="../action/salvarEstampa.php" method="POST" data-toggle="validator">
                <div class="form-group">
                    <label for="inputEmail" class="control-label">Nome da estampa</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome da estampa - min 4 caracteres" required="TRUE" class="form-control"  data-minlength="4" pattern="^[A-z0-9]{4,}$" data-match-errors="texto curto"/><br/>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                </div>
                <input type="submit" name="acao" value="Salvar" class="btn btn-success"/>
            </form>
        </div>
    </div>
    <?php
} else {

    echo "area restrita";
}
?>
<?php include "../template/footer.php"; ?>


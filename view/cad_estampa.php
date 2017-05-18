<?php include "../template/header.php"; ?>
<?php if ($_SESSION["tipo_usuario"] == 1) { ?>
    <div class="container">
        <div class="col-sm-4">

            <form name="cadastroEstampa" action="../action/salvarEstampa.php" method="POST">
                <input type="text" name="nome" id="nome" placeholder="Nome da estampa" required="TRUE" class="form-control"/><br/>
                </br>
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
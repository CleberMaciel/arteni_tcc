<?php include "../template/header.php"; ?>
<?php if ($_SESSION["tipo_usuario"] == 1) { ?>
    <div class="container">
        <div class="col-sm-4">

            <form name="cadastroMateriaPrima" action="../action/salvarMateriaPrima.php"method="POST" enctype="multipart/form-data" data-toggle="validator">
                <div class="form-group">
                    <label for="inputEmail" class="control-label">Nome da matéria-prima</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome da matéria-prima" required="TRUE" class="form-control"data-minlength="4" pattern="^[A-z0-9]{4,}$" data-match-errors="texto curto"/><br/>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                </div>


                <div class="fileinput fileinput-new" data-provides="fileinput">                 
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                    <div>
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Selecione a imagem</span><span class="fileinput-exists">Mudar</span><input type="file" name="imagem" id="imagem"></span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="control-label">Quantidade em estoque</label>
                    <input type="number" name="quantidade" id="quantidade" placeholder="Quantidade em estoque" class="form-control" min="0" required="TRUE"data-minlength="1" pattern="^[0-9]{1,}$" data-match-errors="texto curto"/><br/>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                </div>
                <select name = "materiaPrimaTipo" id = "materiaPrimaTipo" class = "form-control" required>
                    <option disabled selected = ""> Selecione o tipo da materia prima </option>
                    <?php
                    include "../includes/conexao.inc.php";
                    include "../dao/materiaPrimaTipoDAO.php";
                    $materiaPrimaTipo = new materiaPrimaTipoDAO;
                    echo $materiaPrimaTipo->montarCombo();
                    ?>
                </select>

                </br>
<?php include "../template/footer.php"; ?>
                <select name = "estampa" id = "estampa" class = "form-control selectpicker" require data-live-search="true">
                    <option disabled selected = ""  > Selecione a estampa</option>
                    <?php
                    include "../includes/conexao.inc.php";
                    include "../dao/estampaDAO.php";
                    $estampa = new estampaDAO();
                    echo $estampa->montarCombo();
                    ?>
                </select>

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


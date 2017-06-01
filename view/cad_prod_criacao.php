<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include "../template/header.php";
if ($_SESSION["tipo_usuario"] == 1) {
    ?>
    <div class="container">
        <div class="col-sm-4">
            <form name="cadastroProdutoCriacao" action="../action/registrarProdutoCriacao.php"method="POST" data-toggle="validator">
                <div class="form-group">
                    <label class="control-label">Código do produto</label>
                    <input type="text" name="codigo" id="codigo" placeholder="Codigo do produto" required="TRUE" class="form-control" data-minlength="4" pattern="^[A-z0-9]{4,}$" data-match-errors="texto curto"/><br/>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Nome do produto</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome do Produto" required="TRUE" class="form-control"data-minlength="4" pattern="^[A-z0-9]{4,}$" data-match-errors="texto curto"/><br/>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Largura</label>
                    <input type="number" name="largura" id="largura" placeholder="Largura" class="form-control"data-minlength="1" pattern="^[0-9]{1,}$" data-match-errors="texto curto"/><br/>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Altura</label>
                    <input type="number" name="altura" id="altura" placeholder="Altura" class="form-control"data-minlength="1" pattern="^[0-9]{1,}$" data-match-errors="texto curto"/><br/>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Profundidade</label>
                    <input type="number" name="profundidade" id="profundidade" placeholder="Profundidade" class="form-control"data-minlength="1" pattern="^[0-9]{1,}$" data-match-errors="texto curto"/><br/>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                </div>
                <input type="submit" name="acao" value="Proxima Etapa" class="btn btn-success"/>
            </form>
        </div>
    </div>
    <?php
} else {
    echo "area restrita";
}
?>
<?php include "../template/footer.php"; ?>

</body>
</html>
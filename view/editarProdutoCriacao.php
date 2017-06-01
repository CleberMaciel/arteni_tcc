<?php
include "../template/header.php";

include "../includes/conexao.inc.php";
include "../dao/produtoCriacaoDAO.php";
include "../class/produtoCriacao.class.php";

$id = $_GET['ID_PRODUTO_CRIACAO'];

$pDAO = new produtoCriacaoDAO();
$dados = $pDAO->buscarDadosId($id);
?>

<div class="container">
    <div class="col-sm-4">

        <div class="container">

            <form name="cadastroProdutoCriacao" action="../action/salvarProdutoCriacaoEditado.php"method="POST" data-toggle="validator">
                <input type="hidden" value="<?php echo $id ?>" name="id_prod" id="id_prod">

                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label">Código do produto</label>
                        <input type="text" name="codigo" id="codigo" value="<?php echo $dados->CODIGO ?>" placeholder="Codigo do produto" required="TRUE" class="form-control" data-minlength="4" pattern="^[A-z0-9]{4,}$" data-match-errors="texto curto" disabled/><br/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nome do produto</label>
                        <input type="text" name="nome" id="nome"value="<?php echo $dados->NOME ?>" placeholder="Nome do Produto" required="TRUE" class="form-control"data-minlength="4" pattern="^[A-z0-9]{4,}$" data-match-errors="texto curto"/><br/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Largura (cm)</label>
                        <input type="number" name="largura" value="<?php echo $dados->LARGURA ?>" id="largura" placeholder="Largura" class="form-control"data-minlength="1" pattern="^[0-9]{1,}$" data-match-errors="texto curto"/><br/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Altura (cm)</label>
                        <input type="number" name="altura" id="altura" value="<?php echo $dados->ALTURA ?>" placeholder="Altura" class="form-control"data-minlength="1" pattern="^[0-9]{1,}$" data-match-errors="texto curto"/><br/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Profundidade (cm)</label>
                        <input type="number" name="profundidade" id="profundidade" value="<?php echo $dados->PROFUNDIDADE ?>" placeholder="Profundidade" class="form-control"data-minlength="1" pattern="^[0-9]{1,}$" data-match-errors="texto curto"/><br/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>

                    <input type="submit" name="acao" value="Salvar Alteração" class="btn btn-success"/>
                </div>
                <div class = "col-sm-8">
                    <table class="table table-hover">
                        <caption>Matéria-prima(s) usada(s)</caption>
                        <?php echo $pDAO->montarTabelaVenda($id); ?>
                    </table>
                </div>

            </form>

        </div>
        <?php include "../template/footer.php"; ?>
 

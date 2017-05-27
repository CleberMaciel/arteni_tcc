<?php
include "../template/header.php";
include "../includes/conexao.inc.php";

include "../dao/produtoCriacaoDAO.php";

$pcDAO = new produtoCriacaoDAO();
$id = $_GET['codigo'];
$id_p = $_GET['ID_PRODUTO_CRIACAO'];
$dados = $pcDAO->buscarDados($id);
?>

<div class = "container">
    <div class = "col-sm-4">
        <label for="inputEmail" class="control-label">Nome do produto</label>
        <input type = "text" name = "largura" id = "nome" placeholder = "Nome da matéria-prima" value = "<?php echo $dados->PROD_NOME; ?>"required = "TRUE" class = "form-control" disabled/><br/>
        <label for="inputEmail" class="control-label">Largura</label>
        <input type = "text" name = "largura" id = "nome" placeholder = "Nome da matéria-prima" value = "<?php echo $dados->LARGURA; ?> cm"required = "TRUE" class = "form-control" disabled/><br/>
        <label for="inputEmail" class="control-label">Altura</label>
        <input type = "text" name = "altura" id = "nome" placeholder = "Nome da matéria-prima" value = "<?php echo $dados->ALTURA; ?> cm"required = "TRUE" class = "form-control" disabled/><br/>
        <label for="inputEmail" class="control-label">Profundidade</label>
        <input type = "text" name = "profundidade" id = "nome" placeholder = "Nome da matéria-prima" value = "<?php echo $dados->PROFUNDIDADE; ?> cm"required = "TRUE" class = "form-control" disabled/><br/>
    </div>
    <div class = "col-sm-8">
        <table class="table table-hover">
            <?php echo $pcDAO->montarTabelaVenda($id); ?>
        </table>
        <form name = "cadastroProdutoVenda" action = "../action/salvarProdutoVenda.php" method = "POST" enctype = "multipart/form-data">
            <div class = "col-sm-4">
                <input hidden="TRUE" value="<?php echo $id_p ?>" name="id_produto_criacao">
                <label for="inputEmail" class="control-label">Preço</label>
                <input type = "text" name = "valor" id = "valor" placeholder = "Preço"required = "TRUE" class = "form-control" data-mask="99,99"/><br/>
                <label for="comment">Observação:</label>
                <textarea class="form-control" rows="5" id="observacao" name="observacao" required = "TRUE" placeholder="Observações ou detalhamento do produto"></textarea>
                <input type = "submit" name = "acao" value = "Salvar Produto" class = "btn btn-success"/>
            </div>
        </form>
    </div>
</div>
<?php include "../template/footer.php";
?>

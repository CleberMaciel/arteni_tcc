<?php
include "../template/header.php";
include "../includes/conexao.inc.php";

include "../dao/produtoCriacaoDAO.php";

$pcDAO = new produtoCriacaoDAO();
$id = $_GET['codigo'];

$dados = $pcDAO->buscarDados($id);
?>
<div class = "container">
    <div class = "col-sm-4">

        <form name = "cadastroMateriaPrima" action = "../action/editarMateriaPrima.php"method = "POST" enctype = "multipart/form-data">
            <label for="inputEmail" class="control-label">Nome do produto</label>
            <input type = "text" name = "largura" id = "nome" placeholder = "Nome da matéria-prima" value = "<?php echo $dados->PROD_NOME; ?>"required = "TRUE" class = "form-control" disabled/><br/>
            <label for="inputEmail" class="control-label">Largura</label>
            <input type = "text" name = "largura" id = "nome" placeholder = "Nome da matéria-prima" value = "<?php echo $dados->LARGURA; ?> cm"required = "TRUE" class = "form-control" disabled/><br/>
            <label for="inputEmail" class="control-label">Altura</label>
            <input type = "text" name = "altura" id = "nome" placeholder = "Nome da matéria-prima" value = "<?php echo $dados->ALTURA; ?> cm"required = "TRUE" class = "form-control" disabled/><br/>
            <label for="inputEmail" class="control-label">Profundidade</label>
            <input type = "text" name = "profundidade" id = "nome" placeholder = "Nome da matéria-prima" value = "<?php echo $dados->PROFUNDIDADE; ?> cm"required = "TRUE" class = "form-control" disabled/><br/>
            <input type = "submit" name = "acao" value = "Salvar Edição" class = "btn btn-success"/>

    </div>
    <div class = "col-sm-8">
        <table class="table table-hover">
            <?php echo $pcDAO->montarTabelaVenda($id); ?>
        </table>

        <div class = "col-sm-4">
            <label for="inputEmail" class="control-label">Preço</label>
            <input type = "text" name = "valor" id = "valor" placeholder = "Preço"required = "TRUE" class = "form-control" /><br/>
            <label for="inputEmail" class="control-label">Descrição</label>
            <input type = "text" name = "valor" id = "valor" placeholder = "Descrição"required = "TRUE" class = "form-control" /><br/>

        </div>
    </div>


</form>

</div>


<?php include "../template/footer.php";
?>

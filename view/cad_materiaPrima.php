<?php include "../template/header.php"; ?>

<div class="container">
    <div class="col-sm-4">
        <form name="cadastroMateriaPrima" action="../action/salvarMateriaPrima.php"method="POST" enctype="multipart/form-data">
            <input type="text" name="nome" id="nome" placeholder="Nome da matéria-prima" required="TRUE" class="form-control"/><br/>
            <input type="file" name="imagem" id="imagem" class="form-control form-control-file"/>
            <p class="help-block">Selecione uma imagem para a matéria-prima se houver.</p>
            <input type="number" name="quantidade" id="quantidade" placeholder="Quantidade em estoque" class="form-control" min="0" required="TRUE"/><br/>
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
            <input type="submit" name="acao" value="Salvar" class="btn btn-success"/>
        </form>
    </div>
</div>

<?php include "../template/footer.php"; ?>
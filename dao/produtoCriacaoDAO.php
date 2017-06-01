<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of produtoDAO
 *
 * @author krypton
 */
class produtoCriacaoDAO {

    function cadastrarProduto($produto) {
        global $con;
        try {

            $sql = $con->prepare("INSERT INTO PRODUTO_CRIACAO(NOME, LARGURA, ALTURA, PROFUNDIDADE,CODIGO) VALUES (?,?,?,?,?)");
            $sql->bind_param('siiis', $produto->nome, $produto->largura, $produto->altura, $produto->profundidade, $produto->codigo);
            if ($sql->execute()) {
                
            }
        } catch (Exception $e) {
            echo "ERRO: " . $e->getMessage();
            echo "ERRO2: " . $sql->error;
        }//fim try
    }

    function mostrar() {
        global $con;

        try {

            // $sql = $con->prepare("SELECT DISTINCT PRODUTO_CRIACAO.ID_PRODUTO_CRIACAO,PRODUTO_CRIACAO.NOME, PRODUTO_CRIACAO.LARGURA, PRODUTO_CRIACAO.ALTURA, PRODUTO_CRIACAO.PROFUNDIDADE, MATERIA_PRIMA.NOME, PRODUTO_CRIACAO.QTD_USADA, PRODUTO_CRIACAO.CODIGO from PRODUTO_CRIACAO JOIN MATERIA_PRIMA ON MATERIA_PRIMA.ID_MATERIA_PRIMA = PRODUTO_CRIACAO.MATERIA_PRIMA_ID_MATERIA_PRIMA");
            $sql = $con->prepare("SELECT MAX(PRODUTO_CRIACAO.ID_PRODUTO_CRIACAO),MAX(PRODUTO_CRIACAO.NOME),MAX(PRODUTO_CRIACAO.LARGURA), MAX(PRODUTO_CRIACAO.ALTURA), MAX(PRODUTO_CRIACAO.PROFUNDIDADE), MAX(MATERIA_PRIMA.NOME), MAX(PRODUTO_MATERIA.QTD_USADA) FROM PRODUTO_MATERIA
JOIN PRODUTO_CRIACAO
ON PRODUTO_MATERIA.PRODUTO_CRIACAO_ID_PRODUTO_CRIACAO = PRODUTO_CRIACAO.ID_PRODUTO_CRIACAO 
JOIN MATERIA_PRIMA
ON PRODUTO_MATERIA.MATERIA_PRIMA_ID_MATERIA_PRIMA = MATERIA_PRIMA.ID_MATERIA_PRIMA GROUP BY PRODUTO_CRIACAO.NOME");

            $sql->execute();

            $sql->bind_result($id, $nome, $largura, $altura, $profundidade, $materiaPrima_nome, $qtd);

            $dados = "<tr>"
                    . "<th>Produto</th>"
                    . "<th>Largura(cm)</th>"
                    . "<th>Altura(cm)</th>"
                    . "<th>Profundidade(cm)</th>"
                    . "<th>Vender</th>"
                    . "<th>Ver materia-prima</th>"
                    . "<th>Funções</th>"
                    . "</tr>";
            while ($sql->fetch()) {
                $dados .= "<tr>"
                        . "<td>" . $nome . " </td>"
                        . "<td>" . $largura . "</td>"
                        . "<td>" . $altura . "</td>"
                        . "<td>" . $profundidade . "</td>"
                        . "<td>" . "<a class='btn btn-primary' href=cad_produto_venda.php?ID_PRODUTO_CRIACAO=" . $id . ">Colocar a Venda</a></td>"
                        . "<td>" . "<a class='btn btn-success' href=../action/verMateriaQuantidade.php?ID_PRODUTO_CRIACAO=" . $id . ">Visualizar</a></td>"
                        . "<td>" . "<a class='btn btn-success' href=editarProdutoCriacao.php?ID_PRODUTO_CRIACAO=" . $id . ">Editar</a></td>"
                        . "</td>"
                        . "</tr>";
            }
            $dados .= "";
            echo $dados;
        } catch (Exception $e) {
            echo "ERRO: " . $e->getMessage();
        }
    }

    function mostrarMateriaPrimaUsada($id) {
        global $con;
        try {

            $sql = $con->prepare("SELECT MATERIA_PRIMA.NOME, PRODUTO_MATERIA.QTD_USADA from PRODUTO_MATERIA JOIN MATERIA_PRIMA ON MATERIA_PRIMA.ID_MATERIA_PRIMA = PRODUTO_MATERIA.MATERIA_PRIMA_ID_MATERIA_PRIMA JOIN PRODUTO_CRIACAO ON PRODUTO_CRIACAO.ID_PRODUTO_CRIACAO = PRODUTO_MATERIA.PRODUTO_CRIACAO_ID_PRODUTO_CRIACAO WHERE PRODUTO_CRIACAO.ID_PRODUTO_CRIACAO = ?");

            $sql->bind_param('i', $id);


            $sql->execute();

            $sql->bind_result($materiaPrima_nome, $produto_qtd_usada);

            $dados = "<tr>"
                    . "<th>Materia Prima</th>"
                    . "<th>Quantidade Usada (30cm x 30cm)</th>"
                    . "</tr>";
            while ($sql->fetch()) {
                $dados .= "<tr>"
                        . "<td>" . $materiaPrima_nome . " </td>"
                        . "<td>" . $produto_qtd_usada . "</td>"
                        . "</td>"
                        . "</tr>";
            }
            $dados .= "";
            echo $dados;
        } catch (Exception $e) {
            echo "ERRO: " . $e->getMessage();
        }
    }

    function buscarDadosCodigo($id) {
        global $con;
        try {
            $sql = "SELECT * FROM PRODUTO_CRIACAO WHERE CODIGO= '$id'";
            if ($resultado = mysqli_query($con, $sql)) {
                while ($objeto = mysqli_fetch_object($resultado)) {
                    return $objeto;
                }
                mysqli_free_result($resultado);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function buscarDadosId($id) {
        global $con;
        try {
            $sql = "SELECT * FROM PRODUTO_CRIACAO WHERE ID_PRODUTO_CRIACAO= $id";
            if ($resultado = mysqli_query($con, $sql)) {
                while ($objeto = mysqli_fetch_object($resultado)) {
                    return $objeto;
                }
                mysqli_free_result($resultado);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function montarTabelaVenda($id) {
        global $con;
        try {

            $sql = $con->prepare("SELECT PRODUTO_CRIACAO.ID_PRODUTO_CRIACAO, PRODUTO_MATERIA.QTD_USADA AS QUANTIDADE_USADA, MATERIA_PRIMA.NOME AS MATERIA_NOME, MATERIA_PRIMA_TIPO.NOME AS MATERIA_TIPO_NOME, ESTAMPA.NOME AS ESTAMPA_NOME 
FROM PRODUTO_MATERIA 
JOIN MATERIA_PRIMA 
ON PRODUTO_MATERIA.MATERIA_PRIMA_ID_MATERIA_PRIMA = MATERIA_PRIMA.ID_MATERIA_PRIMA 
JOIN ESTAMPA 
ON ESTAMPA.ID_ESTAMPA = MATERIA_PRIMA.ESTAMPA_ID_ESTAMPA 
JOIN MATERIA_PRIMA_TIPO 
ON MATERIA_PRIMA_TIPO.ID_MATERIA_PRIMA_TIPO = MATERIA_PRIMA.MATERIA_PRIMA_TIPO_ID_MATERIA_PRIMA_TIPO
JOIN PRODUTO_CRIACAO
ON PRODUTO_CRIACAO.ID_PRODUTO_CRIACAO = PRODUTO_MATERIA.PRODUTO_CRIACAO_ID_PRODUTO_CRIACAO 
WHERE PRODUTO_CRIACAO.ID_PRODUTO_CRIACAO= ?");

            $sql->bind_param('i', $id);


            $sql->execute();

            $sql->bind_result($id, $quantidade, $materia_prima, $tipo_materia, $estampa);

            $dados = "<tr>"
                    . "<th>Materia Prima</th>"
                    . "<th>Tipo</th>"
                    . "<th>Estampa</th>"
                    . "<th>Quantidade Usada (30cm x 30cm)</th>"
                    . "</tr>";
            while ($sql->fetch()) {
                $dados .= "<tr>"
                        . "<td>" . $materia_prima . " </td>"
                        . "<td>" . $tipo_materia . "</td>"
                        . "<td>" . $estampa . "</td>"
                        . "<td>" . $quantidade . "</td>"
                        . "</td>"
                        . "</tr>";
            }
            $dados .= "";
            echo $dados;
        } catch (Exception $e) {
            echo "ERRO: " . $e->getMessage();
        }
    }

    function atualizarProdutoCriacao($produto) {
        global $con;

        $sql = $con->prepare("UPDATE PRODUTO_CRIACAO SET NOME = ?, LARGURA=?, ALTURA = ?, PROFUNDIDADE = ? WHERE ID_PRODUTO_CRIACAO = ?");
        $sql->bind_param('siiii', $produto->nome, $produto->largura, $produto->altura, $produto->profundidade, $produto->id);

        if ($sql->execute()) {
            echo '<script>alert("p a Editada com sucesso!");</script>';
        } else {
            echo '<script>alert("Erro ao Editar!");</script>';
        }
    }

}

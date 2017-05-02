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

            $sql = $con->prepare("INSERT INTO PRODUTO_CRIACAO(NOME, LARGURA, ALTURA, PROFUNDIDADE, MATERIA_PRIMA_ID_MATERIA_PRIMA, QTD_USADA, CODIGO) VALUES (?,?,?,?,?,?,?)");
            $sql->bind_param('siiiiis', $produto->nome, $produto->largura, $produto->altura, $produto->profundidade, $produto->materiaPrima, $produto->qtd_usada, $produto->codigo);
            if ($sql->execute())
                echo "foi";
        } catch (Exception $e) {
            echo "ERRO: " . $e->getMessage();
            echo "ERRO2: " . $sql->error;
        }//fim try
    }

    function mostrar() {
        global $con;

        try {

            $sql = $con->prepare("SELECT DISTINCT PRODUTO_CRIACAO.ID_PRODUTO_CRIACAO,PRODUTO_CRIACAO.NOME, PRODUTO_CRIACAO.LARGURA, PRODUTO_CRIACAO.ALTURA, PRODUTO_CRIACAO.PROFUNDIDADE, MATERIA_PRIMA.NOME, PRODUTO_CRIACAO.QTD_USADA, PRODUTO_CRIACAO.CODIGO from PRODUTO_CRIACAO JOIN MATERIA_PRIMA ON MATERIA_PRIMA.ID_MATERIA_PRIMA = PRODUTO_CRIACAO.MATERIA_PRIMA_ID_MATERIA_PRIMA");

            $sql->execute();

            $sql->bind_result($id, $nome, $largura, $altura, $profundidade, $materiaPrima_nome, $produto_qtd_usada, $codigo);

            $dados = "<tr>"
                    . "<th>Produto</th>"
                    . "<th>Largura(cm)</th>"
                    . "<th>Altura(cm)</th>"
                    . "<th>Profundidade(cm)</th>"
                    . "<th>Ver materia-prima</th>"
                    . "</tr>";
            while ($sql->fetch()) {
                $dados .= "<tr>"
                        . "<td>" . $nome . " </td>"
                        . "<td>" . $largura . "</td>"
                        . "<td>" . $altura . "</td>"
                        . "<td>" . $profundidade . "</td>"
                        . "<td>" . "<a href=../action/verMateriaQuantidade.php?codigo=" . $codigo . ">Visualizar</a></td>"
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

            $sql = $con->prepare("SELECT MATERIA_PRIMA.NOME, PRODUTO_CRIACAO.QTD_USADA from PRODUTO_CRIACAO JOIN MATERIA_PRIMA ON MATERIA_PRIMA.ID_MATERIA_PRIMA = PRODUTO_CRIACAO.MATERIA_PRIMA_ID_MATERIA_PRIMA WHERE PRODUTO_CRIACAO.CODIGO = ?");

            $sql->bind_param('s', $id);


            $sql->execute();

            $sql->bind_result($materiaPrima_nome, $produto_qtd_usada);

            $dados = "<tr>"
                    . "<th>Materia Prima</th>"
                    . "<th>Quantidade Usada (cm)</th>"
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

}

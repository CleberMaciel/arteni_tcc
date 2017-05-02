<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of materiaPrimaDAO
 *
 * @author krypton
 */
class materiaPrimaDAO {

    function montarCombo() {
        global $con;
        $ops = "";
        try {
            $sql = $con->prepare("SELECT ID_MATERIA_PRIMA, NOME, QTD_TOTAL FROM MATERIA_PRIMA WHERE QTD_TOTAL > 0");
            $sql->execute();
            $sql->bind_result($id, $nome, $qtd);
            while ($sql->fetch()) {
                $ops .= "<option value='" . $id . "'>" . $nome . " - Quantidade total: " . $qtd . "</option>";
            }//while
            return $ops;
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }//fim trycatch
    }

    function AtualizarQuantidade($quantidade, $id) {
        global $con;
        //aqui vai variavel
        try {
            $sql = $con->prepare("UPDATE MATERIA_PRIMA SET QTD_TOTAL = QTD_TOTAL - ? WHERE ID_MATERIA_PRIMA = ?");
            $sql->bind_param("ii", $quantidade, $id);
            $sql->execute();
        } catch (Exception $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }

}

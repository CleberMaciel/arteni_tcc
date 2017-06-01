<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of produtoMateriaDAO
 *
 * @author krypton
 */
class produtoMateriaDAO {

    function cadastro($pm) {

        global $con;
        try {
            $sql = $con->prepare("INSERT INTO PRODUTO_MATERIA(PRODUTO_CRIACAO_ID_PRODUTO_CRIACAO, MATERIA_PRIMA_ID_MATERIA_PRIMA, QTD_USADA) VALUES (?,?,?)");
            $sql->bind_param('iii', $pm->id_produto, $pm->id_materia, $pm->quantidade);
            if ($sql->execute()) {
                
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}

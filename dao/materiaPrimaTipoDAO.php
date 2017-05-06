<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of materiaPrimaTipoDAO
 *
 * @author krypton
 */
class materiaPrimaTipoDAO {

    function montarCombo() {
        global $con;
        $op = "";
        try {
            $sql = $con->prepare("SELECT ID_MATERIA_PRIMA_TIPO, NOME FROM MATERIA_PRIMA_TIPO");
            $sql->execute();
            $sql->bind_result($id, $nome);
            while ($sql->fetch()) {
                $op .= "<option value ='" . $id . "'>" . $nome . "</option>";
            }
            return $op;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}

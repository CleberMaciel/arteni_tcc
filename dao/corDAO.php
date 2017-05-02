<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of corDAO
 *
 * @author krypton
 */
class corDAO {

    function montarCombo() {
        global $con;
        try {
            $sql = $con->prepare("SELECT ID_COR, NOME FROM COR");
            $sql->execute();
            $sql->bind_result($id, $nome);
            while ($sql->fetch()) {
                $ops .= "<option values='" . $id . "'>" . $nome . "</option>";
            }//while
            return $ops;
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }//fim trycatch
    }

}

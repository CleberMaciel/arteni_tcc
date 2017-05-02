<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of materiaPrimaTipo
 *
 * @author krypton
 */
class materiaPrimaTipo {

    private $id_materia_prima_tipo;
    private $nome;

    function __construct($id_materia_prima_tipo = "", $nome = ""){
        $this-> id_materia_prima_tipo = id_materia_prima_tipo;
        $this->nome = nome;
    }
            
    function &__set($prop, $val) {
        $this->$prop = $val;
    }

    function&__get($prop) {
        return $this->$prop;
    }

}

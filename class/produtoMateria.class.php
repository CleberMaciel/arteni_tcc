<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of produtoMateria
 *
 * @author krypton
 */
class produtoMateria {

    private $id_produto;
    private $id_materia;
    private $quantidade;

    function __construct($id_produto, $id_materia, $quantidade) {
        $this->id_produto = $id_produto;
        $this->id_materia = $id_materia;
        $this->quantidade = $quantidade;
    }

    function &__set($prop, $val) {
        $this->$prop = $val;
    }

    function&__get($prop) {
        return $this->$prop;
    }

}

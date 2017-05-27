<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of materiaPrima
 *
 * @author krypton
 */
class materiaPrima {

    //put your code here
    private $id;
    private $nome;
    private $tipo;
    private $imagem;
    private $quantidade;
    private $estampa;

    function __construct($id, $nome, $tipo, $imagem, $quantidade, $estampa) {
        $this->id = $id;
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->imagem = $imagem;
        $this->quantidade = $quantidade;
        $this->estampa = $estampa;
    }

    function &__set($prop, $val) {
        $this->$prop = $val;
    }

    function&__get($prop) {
        return $this->$prop;
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of produtoVenda
 *
 * @author krypton
 */
class produtoVenda {

    //put your code here
    private $id;
    private $imagem;
    private $valor;
    private $descricao;
    private $prod_criacao;

    function __construct($id, $imagem, $valor, $descricao, $prod_criacao) {
        $this->id = $id;
        $this->imagem = $imagem;
        $this->valor = $valor;
        $this->descricao = $descricao;
        $this->prod_criacao = $prod_criacao;
    }

    function &__set($prop, $val) {
        $this->$prop = $val;
    }

    function&__get($prop) {
        return $this->$prop;
    }

}

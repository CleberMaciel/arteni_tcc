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
    private $cor;
    private $imagem;
    private $quantidade;
    private $quantidadeMin;
    private $observacao;

    function __construct($id, $nome, $tipo, $cor, $imagem, $quantidade, $quantidadeMin, $observacao) {
        $this->id = $id;
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->cor = $cor;
        $this->imagem = $imagem;
        $this->quantidade = $quantidade;
        $this->quantidadeMin = $quantidadeMin;
        $this->observacao = $observacao;
    }

    function &__set($prop, $val) {
        $this->$prop = $val;
    }

    function&__get($prop) {
        return $this->$prop;
    }

}

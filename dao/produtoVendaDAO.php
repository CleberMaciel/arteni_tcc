<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of produtoVendaDAO
 *
 * @author Juçara
 */
class produtoVendaDAO {

    function cadastrarProdutoVenda($produto) {
        global $con;

        try {
            $sql = $con->prepare("INSERT INTO PRODUTO_VENDA(IMAGEM, DESCRICAO, VALOR, PRODUTO_CRIACAO_ID_PRODUTO_CRIACAO) VALUES (?,?,?,?)");
            $sql->bind_param('sssi', $produto->imagem, $produto->descricao, $produto->valor, $produto->prod_criacao);
            if ($sql->execute()) {
                
            } else {
                
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function mostrarItens() {
        global $con;
        $ops = "";
        try {
            $sql = $con->prepare("SELECT PRODUTO_CRIACAO.NOME, PRODUTO_VENDA.VALOR, PRODUTO_CRIACAO.CODIGO FROM PRODUTO_VENDA JOIN PRODUTO_CRIACAO ON PRODUTO_VENDA.PRODUTO_CRIACAO_ID_PRODUTO_CRIACAO = PRODUTO_CRIACAO.ID_PRODUTO_CRIACAO");
            $sql->execute();
            $sql->bind_result($nome, $valor, $codigo);
            while ($sql->fetch()) {
                $ops .= '<div class="col-sm-3">'
                        . '<div class="col-item">'
                        . '<div class="photo">'
                        . '<img src="http://placehold.it/350x260" class="img-responsive" alt="a" />'
                        . '</div><div class="info">'
                        . '<div class="row">'
                        . '<div class="price col-md-6">'
                        . ' <h5>'
                        . " $nome"
                        . '</h5>'
                        . '<h5 class="price-text-color">R$'
                        . "$valor"
                        . '</h5>'
                        . '</div>'
                        . '<div class="rating hidden-sm col-md-6">'
                        . '<i class = "price-text-color fa fa-star"></i><i class = "price-text-color fa fa-star">'
                        . ' </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">'
                        . ' </i><i class = "fa fa-star"></i>'
                        . '                 </div>'
                        . ' </div>'
                        . '      <div class="separator clear-left">'
                        . ' <p class = "btn-add">'
                        . '<i class="fa fa-shopping-cart"></i><a href="#" class="hidden-sm">Add ao carrinho</a></p>'
                        . ' <p class = "btn-details">'
                        . '<i class="fa fa-list"></i><a href="../verDetalhesProdutoVenda?id=' . "$codigo" . ' "class="hidden-sm">Mais detalhes</a></p>'
                        . ' </div>'
                        . ' <div class="clearfix">'
                        . ' </div>'
                        . '  </div>'
                        . ' </div>'
                        . '  </div>';
            }
            echo $ops;
        } catch (Exception $ex) {
            
        }
    }

}

<?php
    // informações relativas a conexão
    $host = "";
    $usuario = "";  
    $senha = ""; // mudar a senha para a do seu banco! :) 
    $banco = "";    // mudar o nome para o do seu banco! :)
    
    // incia a conexão usando o construtor da classe mysqli passando os parâmetros de conexão
    $con = new mysqli($host, $usuario, $senha, $banco);
    // caso a função retrne true, houve um erro e ele será demonstrado de forma descritiva
    if(mysqli_connect_errno()) {
        die('Não foi possível conectar na base de dados escolhida. Erro: ' .mysqli_connect_error());
        exit();
    }
    
    // configura o driver o MySQL para reportar erros
    // enquanto estamos trabalhando em desenvolvimento é uma boa opção para identificar os erros de MySQL
    $driver = new mysqli_driver();
    $driver->report_mode = MYSQLI_REPORT_ERROR;
?>
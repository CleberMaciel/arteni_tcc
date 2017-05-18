<?php

include '../dao/estampaDAO.php';
include '../includes/conexao.inc.php';
include '../class/estampa.class.php';

$nome = $_POST["nome"];

$eDAO = new estampaDAO();

$estampa = new estampa("", $nome);

$eDAO->cadastrarEstampa($estampa);

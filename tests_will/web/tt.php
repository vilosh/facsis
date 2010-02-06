<?php
require_once('../../public/bootstrap.php');
require_once('will/template/Template.class.php');

$variaveis = array( 'title' => 'Vendas' );
$template = new Template( '../templates/teste.template.php', $variaveis);
$template->render();
?>

<?php
    // PHP DATA OBJECT - PHP Orinetado a Objetos
    $username = 'root'; /* Nome do usuário do Banco*/
    $password = ''; /* Senha do usuário do Banco*/
    $pdo = new PDO('mysql:host=localhost;dbname=system', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);/* Irá exibir as exceções erros ao objeto pdo */

    // Faz a consuta nas tabelas desejadas
$consulta = $pdo->query("SELECT * FROM users;");


while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: {$linha['id_user']} - Login: {$linha['login']} <a href='form_update.php?id_user={$linha['id_user']}'>Atualizar</a>---<a href='delete.php?id_user={$linha['id_user']}'>Deletar</a><br /> ";
}

<?php
    // PHP DATA OBJECT - PHP Orinetado a Objetos
    $username = 'root'; /* Nome do usuário do Banco*/
    $password = ''; /* Senha do usuário do Banco*/
    


$id_user = 4;
$login = "Novo Admin";
$login = sha1($login);

try {
    $pdo = new PDO('mysql:host=localhost;dbname=system', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);/* Irá exibir as exceções erros ao objeto pdo */

  $stmt = $pdo->prepare('UPDATE users SET login = :login WHERE id_user = :id_user');
  $stmt->execute(array(
    ':id_user'   => $id_user,
    ':login' => $login
  ));

  echo 'Linhas da Tabela Afetadas '.$stmt->rowCount(); /* Linhas afetadas */
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}

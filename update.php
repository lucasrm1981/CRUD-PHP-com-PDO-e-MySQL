<?php
    /* PHP DATA OBJECT - PHP Orinetado a Objetos*/
    $username = 'root'; /* Nome do usuário do Banco*/
    $password = ''; /* Senha do usuário do Banco*/
    


$id_user = $_POST['id_user'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$senha = sha1($login);

try {
    $pdo = new PDO('mysql:host=localhost;dbname=system', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);/* Irá exibir as exceções erros ao objeto pdo */

    /* Prepara o objeto statement e faz a execução da query*/
  $stmt = $pdo->prepare('UPDATE users SET login = :login, senha = :senha WHERE id_user = :id_user');
  $stmt->execute(array(
    ':id_user' => $id_user,
    ':login' => $login,
    ':senha' => $senha,
  ));

  echo 'Linhas da Tabela Afetadas '.$stmt->rowCount(); /* Linhas afetadas */
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}

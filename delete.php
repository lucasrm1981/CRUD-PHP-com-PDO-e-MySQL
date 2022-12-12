<?php
    // PHP DATA OBJECT - PHP Orinetado a Objetos
    $username = 'root'; /* Nome do usuário do Banco*/
    $password = ''; /* Senha do usuário do Banco*/
    $pdo = new PDO('mysql:host=localhost;dbname=system', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);/* Irá exibir as exceções erros ao objeto pdo */


$id_user = $_GET['id_user'];

try {

  $stmt = $pdo->prepare('DELETE FROM users WHERE id_user = :id_user');
  $stmt->bindParam(':id_user', $id_user);
  $stmt->execute();

  echo 'Linhas da Tabela Afetadas '.$stmt->rowCount(); /* Linhas afetadas */
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
?>
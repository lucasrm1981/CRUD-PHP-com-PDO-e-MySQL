<?php
try {
    // PHP DATA OBJECT - PHP Orinetado a Objetos
    $username = 'root'; /* Nome do usuário do Banco*/
    $password = ''; /* Senha do usuário do Banco*/
    $pdo = new PDO('mysql:host=localhost;dbname=system', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);/* Irá exibir as exceções erros ao objeto pdo */

    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $senha = sha1($senha);
    // Prepara o objeto statement e faz a execução da query
    $stmt = $pdo->prepare('INSERT INTO users (login,senha) VALUES(:login,:senha)');
   //Execução do array
    $stmt->execute(array(
        ':login' => $login,
        ':senha' => $senha,
    ));
/* Exibe Linhas afetadas */
    echo 'Linhas da Tabela Afetadas '.$stmt->rowCount(); 
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

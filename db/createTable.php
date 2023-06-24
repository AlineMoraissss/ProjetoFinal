<?php
include('../banco.php');

try {
    $conn = Banco::conectar();

    $sql = file_get_contents('../projetos.sql');
    // echo $sql;
    $conn->exec($sql);
    Banco::desconectar();
    echo 'SQL EXECUTADO COM SUCESSO';
} catch (PDOException $e) {
    echo "Error creating tables: " . $e->getMessage();
}

?>
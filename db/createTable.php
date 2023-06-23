<?php
include('../banco.php');

try {
    $conn = Banco::conectar();

    $sql = file_get_contents('../projetos.sql');
    echo $sql;
    Banco::desconectar();
} catch (PDOException $e) {
    echo "Error creating tables: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Página Inicial</title>
</head>

<body>
        <div class="container">
          <div class="jumbotron">
            <div class="row">
                <h2>PRODUTOS</h2>
            </div>
            <h8>Olá! Seja bem-vindo(a) ao banco de dados do sistema, onde você encontrará uma lista dos produtos cadastrados na sua empresa. Aqui, você terá acesso a informações relevantes associados a cada produto ao clicar em "Info". Além disso, oferecemos a possibilidade de inserir novos produtos ao clicar em "Novo produto", realizar edições em produtos existentes ao clicar em "Editar" e excluir itens já cadastrados ao clicar em "Excluir".
            <br> Autor(a): Aline Rodrigues Morais RA:0047953</h8>          
          </div>
          <a class="btn btn-primary" href="create.php">Novo produto</a>
            </br>
            <div class="row">
                <p>
                    <!-- <a href="create.php" class="btn btn-success">Novo projeto</a> -->
                </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <!--<th scope="col">Id</th>-->
                            <th scope="col">Id_produto</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Marca</th>
                           <!-- <th scope="col">Resp. montadora</th> -->
                           <!-- <th scope="col">E-mail montadora</th> -->
						   <!-- <th scope="col">Tel. montadora</th> -->
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT Id_produto, modelo, marca  FROM produto  ORDER BY Id_produto ASC';

                        foreach($pdo->query($sql)as $row)
                        {
                            echo '<tr>';
			                //echo '<th scope="row">'. $row['id'] . '</th>';
                            echo '<td>'. $row['Id_produto'] . '</td>';
                            echo '<td>'. $row['modelo'] . '</td>';
                            echo '<td>'. $row['marca'] . '</td>';
                            //echo '<td>'. $row['responsavel_montadora'] . '</td>';
                            //echo '<td>'. $row['email_montadora'] . '</td>';
							//echo '<td>'. $row['telefone_montadora'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-primary" href="read.php?id='.$row['Id_produto'].'">Info</a>';
                            echo ' ';                                                   
                            echo '<a class="btn btn-warning" href="update.php?id='.$row['Id_produto'].'">Editar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['Id_produto'].'">Excluir</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>

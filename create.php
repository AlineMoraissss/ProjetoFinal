<?php
require 'banco.php';
//Acompanha os erros de validação

// Processar so quando tenha uma chamada post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
    $Id_produtoErro = null;
    $modeloErro = null;
    $marcaErro = null;

    if (!empty($_POST)) {
        $validacao = True;
        $novoUsuario = False;
		
        if (!empty($_POST['Id_produto'])) {
            $nomeProduto = $_POST['Id_produto'];
        } else {
            $Id_produtoErro = 'Por favor digite o Id do produto:';
            $validacao = False;
        }


        if (!empty($_POST['modelo'])) {
            $modelo = $_POST['modelo'];
        } else {
            $modeloErro = 'Por favor digite o modelo do produto:';
            $validacao = False;
        }


        if (!empty($_POST['marca'])) {
            $marca = $_POST['marca'];
        } else {
            $marcaErro = 'Por favor digite o nome da marca do produto:';
            $validacao = False;
        }
        	
		
    }

//Inserindo no Banco:
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO produto(Id_produto, modelo, marca) VALUES(?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nomeProduto, $modelo, $marca));
        Banco::desconectar();
        header("Location: index.php");
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Adicionar Projeto</title>
</head>

<body>
<div class="container">
    <div clas="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Projeto </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="create.php" method="post">

                    <div class="control-group  <?php echo !empty($Id_produtoErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Id do produto*</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="Id_produto" type="text" placeholder="Id do produto"
                                   value="<?php echo !empty($nomeProduto) ? $nomeProduto : ''; ?>">
                            <?php if (!empty($Id_produtoErro)): ?>
                                <span class="text-danger"><?php echo $Id_produtoErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($modeloErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Modelo do produto*</label>
                        <div class="controls">
                            <input size="80" class="form-control" name="modelo" type="text" placeholder="Modelo do produto"
                                   value="<?php echo !empty($modelo) ? $modelo : ''; ?>">
                            <?php if (!empty($modeloErro)): ?>
                                <span class="text-danger"><?php echo $modeloErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                                              
                        <div class="control-group <?php echo !empty($marcaErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Marca do produto*</label>
                        <div class="controls">
                            <input size="80" class="form-control" name="marca" type="text" placeholder="Marca do produto"
                                   value="<?php echo !empty($marca) ? $marca : ''; ?>">
                            <?php if (!empty($marcaErro)): ?>
                                <span class="text-danger"><?php echo $marcaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
					 
									
                    <div class="form-actions">
                        <br/>
                        <button type="submit" class="btn btn-success">Adicionar</button>
                        <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>


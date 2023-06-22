<?php

require 'banco.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
}

if (!empty($_POST)) {

    $modeloErro = null;
    $marcaErro = null;
       
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    
    //Validação
    $validacao = true;
	
    if (empty($modelo)) {
        $modeloErro = 'Por favor digite o modelo do produto:';
        $validacao = false;
    }

    if (empty($marca)) {
        $marcaErro = 'Por favor digite a marca do produto:';
        $validacao = false;
    }
  

    // update data
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE produto set  modelo = ?, marca = ? WHERE Id_produto = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($modelo, $marca, $id));
        Banco::desconectar();
        header("Location: index.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT modelo,marca FROM produto WHERE Id_produto=? ORDER BY Id_produto ASC';
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
	
	$modelo = $data['modelo'];
    $marca = $data['marca'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- using new bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Atualizar Projeto</title>
</head>

<body>
<div class="container">

    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Escreva nos campos para atualizar as informações do produto: </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="update.php?id=<?php echo $id ?>" method="post">

                    <div class="control-group  <?php echo !empty($modeloErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Modelo do produto*</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="modelo" type="text" placeholder="Modelo do produto"
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
                    
		 <!-- -->
                    <div class="form-actions">
                        <br/>
                        <button type="submit" class="btn btn-success">Atualizar</button>
                        <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
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

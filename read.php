<?php
require 'banco.php';
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT Projetos_eletricos.Id_projetos,Projetos_eletricos.Id_contrato,Contratos.cliente,Contratos.localizacao,Contratos.tempo_de_execucao,Contratos.valor,Contratos.data_de_inicio, Contratos.data_de_entrega,Contratos.concluido FROM ATENDE JOIN Projetos_eletricos ON ATENDE.Id_projetos = Projetos_eletricos.Id_projetos JOIN Contratos ON Projetos_eletricos.Id_contrato = Contratos.Id_contrato WHERE ATENDE.Id_produto = ? ORDER BY ATENDE.Id_produto ASC';
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Banco::desconectar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Informações do Produto</title>
</head>

<body>
<div class="container">
    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well">Informações do Produto</h3>
            </div>
            <div class="container">
                <div class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Projeto elétrico associado a esse produto:</label>
                        <div class="controls form-control">
                            <label class="carousel-inner">
                                <?php echo $data['Id_projetos']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Contrato associado a esse produto:</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['Id_contrato']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Cliente</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['cliente']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Localização do Cliente</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['localizacao']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Tempo de execução do projeto elétrico (Horas)</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['tempo_de_execucao']; ?>
                            </label>
                        </div>
                    </div>
					
					<div class="control-group">
                        <label class="control-label">Valor do projeto elétrico (R$)</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['valor']; ?>
                            </label>
                        </div>
                    </div>
					
					
					<div class="control-group">
                        <label class="control-label">Data de início do projeto elétrico:</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['data_de_inicio']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Data de entrega do projeto elétrico:</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['data_de_entrega']; ?>
                            </label>
                        </div>
                    </div>

					<div class="control-group">
                        <label class="control-label">Status de conclusão do projeto  elétrico ( 1 = concluído / 0 = em execução)</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['concluido']; ?>
                            </label>
                        </div>
                    </div>
		 <!-- -->
		 
                    <br/>
                    <div class="form-actions">
                        <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
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

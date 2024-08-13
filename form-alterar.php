<?php
require 'header.php';

require "conexao.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(empty($id)){
    ?>
    <div class="alert alert-danger" role="alert">
        <h4>Falha ao abrir formulário para edição.</h4>
        <p>ID está vazio.</p>
    </div>
<?php
    exit;
}

$sql = "select tipo, marca, tamanho
        FROM roupa where id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

$registroContato = $stmt->fetch();
?>

<div class="inicio">
    <div class="bg-light p-4 mb-4 rounded">
        <h1 class="text-center">Alterar Roupa</h1>
    </div>

    <div class="row">
        <div class="col-8 offset-2">
            <form class="row g-3" action="destino-alterar.php" method="POST">
                <input type="hidden" name="id" value="<?=$id?>">
                <div class="col-6">
                    <div class="mb-2">
                        <label for="tipo">Tipo:</label>
                        <input class="form-control" type="text" name="tipo" id="tipo" placeholder="Ex: Camiseta, Calça, Bermuda, etc.."
                        required autofocus value="<?=$registroContato["tipo"]?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-2">
                        <label for="marca">Marca:</label>
                        <input class="form-control" type="text" name="marca" id="marca" 
                        placeholder="Digite a marca escolhida" required value="<?=$registroContato["marca"]?>">
                    </div>
		</div>
		<div class="col-6">
                    <div class="mb-2">
                        <label for="tamanho">Tamanho:</label>
                        <input class="form-control" type="text" name="tamanho" id="tamanho" 
                        placeholder="Informe apenas a inicial. Ex: P, M, G, etc.." required value="<?=$registroContato["tamanho"]?>">
                    </div>
                </div>

                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <button type="reset" class="btn btn-warning">Limpar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require 'footer.php'
?>

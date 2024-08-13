<?php require 'header.php'?>

<div class="inicio">
    <div class="bg-light p-4 mb-4 rounded">
        <h1 class="text-center">Formulário para contato</h1>
    </div>

    <div class="row">
        <?php
        $tipo = filter_input(INPUT_POST, "tipo", FILTER_SANITIZE_SPECIAL_CHARS);
        $marca = filter_input(INPUT_POST, "marca", FILTER_SANITIZE_SPECIAL_CHARS);
        $tam = filter_input(INPUT_POST, "tamanho", FILTER_SANITIZE_SPECIAL_CHARS);

	echo "<p>Tipo da Roupa: $tipo</p>";
        echo "<p>Marca Escolhida: $marca</p>";
        echo "<p>Tamanho: $tam</p>";

        require "conexao.php";

        $sql = "insert into roupa (tipo, marca, tamanho) values (?, ?, ?)";

        try {
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([$tipo, $marca, $tam]);
        } catch (Exception $e) {
            $result = false;
            $error = $e->getMessage();
        }

        if ($result == true) {
        ?>
            <div class="alert alert-success" role="alert">
                <h4>Dados gravados com sucesso!</h4>
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-danger" role="alert">
                <h4>Falha ao efetuar gravação.</h4>
                <p><?php echo $error; ?></p>
            </div>            
        <?php
        }
        ?>

    </div>
    <a href="listagem.php" class="btn btn-info ms-5" role="button">Voltar</a>
</div>

<?php
require 'footer.php'
?>

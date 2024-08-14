<?php
require 'header.php';
?>

<div class="inicio">
    <div class="bg-light p-4 mb-4 rounded">
        <h1 class="text-center">Formulário para contato</h1>
    </div>

    <div class="row">
        <?php
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
        $tipo = filter_input(INPUT_POST, "tipo", FILTER_SANITIZE_SPECIAL_CHARS);
        $marca = filter_input(INPUT_POST, "marca", FILTER_SANITIZE_SPECIAL_CHARS);
        $tamanho = filter_input(INPUT_POST, "tamanho", FILTER_SANITIZE_SPECIAL_CHARS);

        echo "<p>ID: $id</p>";
        echo "<p>Tipo de Roupa: $tipo</p>";
        echo "<p>Marca: $marca</p>";
        echo "<p>Tamanho: $tamanho</p>";

        require "conexao.php";

        $sql = "update roupa SET tipo = ?, marca = ?, tamanho = ? where id = ?";

        try {
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([$tipo, $marca, $tamanho, $id]);
        } catch (Exception $e) {
            $result = false;
            $error = $e->getMessage();
        }

        if ($result == true) {
        ?>
            <div class="alert alert-success" role="alert">
                <h4>Dados alterados com sucesso!</h4>
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

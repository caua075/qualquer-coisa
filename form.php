<?php require 'header.php'; ?>

        <h2 class="my-4">Adicionar Roupa</h2>
        
        <form action="destino.php" method="POST">
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ex: Camiseta, Bermuda, Calça, etc.." required>
            </div>
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" required>
            </div>
            <div class="mb-3">
	        <label class="form-label" for="tamanho">Tamanho</label>
		<input type="text" class="form-control" id="tamanho" name="tamanho" placeholder="Insira apenas a Inicial. Ex: P, M, G, etc.."  required>
	    </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <button type="reset" class="btn btn-secondary">Limpar</button>
            </div>
        </form>

        <?php require 'footer.php'; ?>

<!-- Aqui vai ficar topo, a navabar e o banner -->
<?php include 'App/Template/topo.php'; ?>

<main>
    <fieldset>

        <legend>
            <h3>Cadastro</h3>
        </legend>

        <form method="POST" action="/pessoa/salvar">

            
            <input id="id" name="id" value="<?= $linha['id'] ?>" type="hidden" />

            <label form="nome" class="obrigatorio" >Nome</label>
            <input id="nome" name="nome" type="text" value="<?= $linha['nome'] ?>" />

            <label for="email" class="obrigatorio" >E-mail</label>
            <input id="email" name="email" type="email" value="<?= $linha['email'] ?>" />

            <label for="telefone" class="obrigatorio" >Telefone</label>
            <input id="telefone" name="telefone" type="telefone" maxlength="15" value="<?= $linha['telefone'] ?>" />

            <div class="form-button">
                <button type="submit"> SALVAR </button>
            </div>

        </form>

    </fieldset>
</main>

<!-- rodapé -->
<?php include 'App/Template/rodape.php'; ?>
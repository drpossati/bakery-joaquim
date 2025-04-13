<!-- Aqui vai ficar topo, a navabar e o banner -->
<?php include 'App/Template/topo.php'; ?>

<main>
    <fieldset>

        <legend>
            <h3>Cadastro de Pessoas</h3>
        </legend>

        <form method="POST" action="/pessoa/salvar">

            
            <input id="id" name="id" value="<?= $linha['id'] ?>" type="hidden" />

            <label>Nome</label>
            <input id="nome" name="nome" type="text" value="<?= $linha['nome'] ?>" />

            <label>E-mail</label>
            <input id="email" name="email" type="text" value="<?= $linha['email'] ?>" />

            <label>Telefone</label>
            <input id="telefone" name="telefone" type="text" maxlength="15" value="<?= $linha['telefone'] ?>" />

            <button type="submit"> SALVAR </button>

        </form>

    </fieldset>
</main>

<!-- rodapé -->
<?php include 'App/Template/rodape.php'; ?>
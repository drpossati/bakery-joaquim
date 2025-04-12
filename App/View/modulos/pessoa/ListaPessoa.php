<?php include "/var/www/bakery-joaquim/App/Template/topo.php"; ?>

<main>

    <table align="center" cellpadding="10px">

        <tr>

            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>

        </tr>

        <!-- Laço para percorrer todos os registros vindos do banco de dados -->
        <?php foreach ($linhas as $item): ?>
            <tr>
                <td><?= $item->id ?></td>
                <td><?= $item->nome ?></td>
                <td><?= $item->email ?></td>
                <td><?= $item->telefone ?></td>
                <td><a href="/pessoa/cadastro?id=<?= $item->id ?>" ><button>EDITAR</button></a></td>
                <td><a href="/pessoa/delete?id=<?= $item->id ?>" ><button>EXCLUIR</button></a></td>
            </tr>
        <?php endforeach; ?>

    </table>

</main>

<?php include "/var/www/bakery-joaquim/App/Template/rodape.php" ?>
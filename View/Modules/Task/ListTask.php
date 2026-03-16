<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
</head>
<body>
    <legend>Lista de Tarefas</legend>
    <table>
        <tr>
            <th></th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Data de Vencimento</th>
        </tr>
<?php foreach($tasks as $item): ?>
        <tr>
            <td>
                <a href="/task/delete?id=<?= $item->id ?>">X</a>

            </td>

            <td><?= $item->title ?></td>

            <td>
                <a href="/task/form?id=<?= $item->id ?>"><?= $item->title ?></a>
            </td>

            <td><?= $item->description ?></td>
            <td><?= $item->status ?></td>
            <td><?= $item->due_date ?></td>
        </tr>
        <?php endforeach ?>

        
        <?php if(count($tasks) == 0): ?>
            <tr>
                <td colspan="5">Nenhum registro encontrado.</td>
            </tr>
        <?php endif ?>

    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Tarefas</title>
</head>
<body>
    <fieldset>
    <legend>Cadastro de Tarefas</legend>
        <form method="post" action="/task/form/save">
             <input type="hidden" name="id" value="<?= htmlspecialchars($model->id ?? '') ?>">

            <label for="title">Título:</label><br>
            <input type="text" id="title" name="title"required minlength="3"maxlength="120" ><br><br>

            <label for="description">Descrição:</label><br>
            <textarea id="description" name="description"></textarea><br><br>

            <label for="status">Status:</label><br>
            <select id="status" name="status" required>
                <option value="todo" selected>Todo</option>
                <option value="doing">Doing</option>
                <option value="done">Done</option>
            </select><br><br>

            <label for="due_date">Data de vencimento:</label><br>
            <input type="date" id="due_date" name="due_date"><br><br>
            <?php if (!empty($errors)): ?>
            <div style="background:#ffebeb; color:#a10000; padding:10px;">
           <?php foreach ($errors as $e): ?>
            <p><?= $e ?></p>
           <?php endforeach ?>
           </div>
          <?php endif ?>


            <input type="submit" value="Salvar">
        </form>
    </fieldset>
</body>
</html>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Админка</h1>
<table>
    <?php foreach ($articles as $article) { ?>
        <tr>
            <td><a href="/edit.php?id=<?php echo $article->id; ?>"><?php echo $article->title; ?></a></td>
            <td><a href="/delete.php?id=<?php echo $article->id; ?>">Удалить</a></td>
        </tr>
    <?php } ?>
</table>

<h2>Добавить новость</h2>
<form action="/save.php" method="post">
    Заголовок: <input type="text" name="title"><br>
    Текст:<br>
    <textarea name="content"></textarea>
    <br>
    <input type="submit">
</form>
</body>
</html>
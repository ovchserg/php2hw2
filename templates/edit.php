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
<h2>Редактировать новость</h2>
<form action="/save.php" method="post">
    <input type="hidden" name="id" value="<?php echo $article->id; ?>">
    Заголовок: <input type="text" name="title" value="<?php echo $article->title; ?>"><br>
    Текст:<br>
    <textarea name="content"><?php echo $article->content; ?></textarea>
    <br>
    <input type="submit">
</form>
</body>
</html>
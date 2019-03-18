<?php

include __DIR__ . '/autoload.php';

use App\Models\Article;

$article = new Article;
$article->id = $_POST['id'] ?? null;
$article->title = $_POST['title'];
$article->content = htmlspecialchars($_POST['content']);
$article->save();

header('location: /index.php');
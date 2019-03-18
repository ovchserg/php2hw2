<?php

include __DIR__ . '/autoload.php';

use App\Models\Article;

Article::findById($_GET['id'])->delete();

header('location: /index.php');
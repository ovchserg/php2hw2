<?php

require __DIR__ . '/autoload.php';

use App\Models\Article;

$articles = Article::findAll();

include __DIR__ . '/templates/index.php';
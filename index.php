<?php

require __DIR__ . '/autoload.php';

$news = \App\Models\Article::getLast(3);

include __DIR__ . '/templates/news.php';
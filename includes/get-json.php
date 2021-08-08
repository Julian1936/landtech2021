<?php 

$articlesFile = json_decode(file_get_contents('json/data.json'));
$articles     = $articlesFile->blogs;
$authors      = $articlesFile->authors;
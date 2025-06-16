<?php
// 10.php
$name = $_POST['name'];
$comment = $_POST['comment'];

$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$comment = htmlspecialchars($comment, ENT_QUOTES, 'UTF-8');

echo "{$name}さんのコメント：{$comment}";

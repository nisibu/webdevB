<?php

// 一回だけ読み込み
// require_onceは、読み込まれないとエラーになる→止まる
require_once('function.php');

// データを読み込む（だけ）
$fp = fopen('bookdata.csv', 'r');
// ファイルが開けたか確認
if ($fp === false) {
    echo 'ファイルのオープンに失敗しました。';
    exit;
}

//書籍名と著者名を表示する
//htmlspecialchars()関数を使ってXSS対策を行う
while ($row = fgetcsv($fp)) {
    echo '<ul>';
    echo '<li>' . "書籍名："  . htmlspecialchars($row[0], ENT_QUOTES, 'UTF-8') . '</li>';
    echo '<li>' . "著者名："  . htmlspecialchars($row[4], ENT_QUOTES, 'UTF-8') . '</li>';
    echo '</ul>';
}

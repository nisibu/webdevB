<?php
# connect1.php→list.php
require_once './functions.php';

try {
    $dbh = db_open(); // 関数を実行してDB接続
    $spl = 'SELECT title,author FROM books';
    $statement = $dbh->prepare($spl);

    while ($row = $statement->fetch()) {
        // データを1行ずつ取得
        echo "書籍名:" . str2html($row[0]) . "<br>";
        echo "著者名:" . str2html($row[1]) . "<br><br>";
    }

    // var_dump($dbh);
} catch (PDOException $e) {
    echo '接続失敗:' . str2html($e->getMessage()) . '<br>';
    exit;
}

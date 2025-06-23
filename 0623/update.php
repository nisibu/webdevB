<?php
require_once 'functions.php';

if (empty($_POST['id'])) {
    echo 'idを指定してください。';
    exit;
}
if (!preg_match('/\A\d+\z/u', $_POST['id'])) {
    echo 'idが正しくありません。';
    exit;
}

// タイトルのチェック
if (empty($_POST['title'])) {
    echo 'タイトルは必須です<br>';
    exit;
}
if (!preg_match('/\A[[:^cntrl:]]{1,200}\z/u', $_POST['title'])) {
    echo 'タイトルは200文字までです。';
    exit;
}

// 著作者のチェック（80文字以内の任意文字）
if (!preg_match('/\A.{0,80}\z/u', $_POST['author'])) {
    echo '著作者は80文字以内で入力してください。';
    exit;
}

try {
    $dbh = db_open();
    $sql = 'UPDATE books SET title = :title, isbn = :isbn, price = :price, publish = :publish, author = :author WHERE id = :id';
    $stmt = $dbh->prepare($sql);
    $price = (int)$_POST['price'];

    $stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $stmt->bindParam(':isbn', $_POST['isbn'], PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    $stmt->bindParam(':publish', $_POST['publish'], PDO::PARAM_STR);
    $stmt->bindParam(':author', $_POST['author'], PDO::PARAM_STR);
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT); // idが整数の場合

    $stmt->execute();

    echo 'データが更新されました。<br>';
    echo '<a href="list.php">リストに戻る</a><br>';
} catch (PDOException $e) {
    echo 'エラー!:' . str2html($e->getMessage()) . '<br>';
    exit;
}

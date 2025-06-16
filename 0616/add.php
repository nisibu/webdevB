<?php
# add.php
// var_dump($_POST);
require_once 'functions.php';

if (empty($_POST['title'])) {
    echo 'タイトルは必須です<br>';
    exit;
}

if (!preg_match('/\A[[:^cntrl:]]{1,200}\z/u', $_POST['title'])) {
    echo 'タイトルは200文字までです。';
    exit;
}

if (!preg_match('/\A\d{0,13}\z/u', $_POST['isbn'])) {
    echo 'ISBNは数字13桁までです。';
    exit;
}

if (!preg_match('/\A\d{0,6}\z/u', $_POST['price'])) {
    echo '定価は数字6桁までです。';
    exit;
}

if (empty($_POST['publish'])) {
    echo '日付は必須です。';
    exit;
}

if (!preg_match('/\A\d{4}-\d{1,2}-\d{1,2}\z/u', $_POST['publish'])) {
    echo '日付のフォーマットが違います。';
    exit;
}

$date = explode('-', $_POST['publish']);
if (!checkdate((int)$date[1], (int)$date[2], (int)$date[0])) {
    echo '正しい日付を入力してください。';
    exit;
}

if (!preg_match('/\A[[:^cntrl:]]{1,80}\z/u', $_POST['author'])) {
    echo '著者名は80文字以内で入力してください。';
    exit;
}

try {
    $dbh = db_open(); // 関数を実行してDB接続
    // $stmt = $dbh->prepare($sql);
    $spl = 'INSERT INTO books (id, title, isbn, price, publish, author)
VALUES (NULL, :title, :isbn, :price, :publish, :author)';
    $stmt = $dbh->prepare($spl);

    // var_dump($stmt);

    $price = (int)$_POST['price'];
    $stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $stmt->bindParam(':isbn', $_POST['isbn'], PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    $stmt->bindParam(':publish', $_POST['publish'], PDO::PARAM_STR);
    $stmt->bindParam(':author', $_POST['author'], PDO::PARAM_STR);

    $stmt->execute();
    echo 'データが追加されました。<br>';
    echo '<a href="list.php">リストに戻る</a><br>';
} catch (PDOException $e) {
    echo '接続失敗:' . str2html($e->getMessage()) . '<br>';
    exit;
}
var_dump($_POST);

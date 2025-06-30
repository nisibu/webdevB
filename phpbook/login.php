<?php
// login.php
session_start();
require_once __DIR__ . '/inc/functions.php';

// 既にログインしている場合はリダイレクト
if (!empty($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}

// ログイン処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = 'ユーザー名とパスワードを入力してください。';
    } else {
        try {
            $dbh = db_open();
            $sql = 'SELECT password FROM users WHERE username = :username';
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                $error = 'ログインに失敗しました。';
            } else {
                if (password_verify($_POST['password'], $result['password'])) {
                    session_regenerate_id(true);
                    $_SESSION['login'] = true;
                    header('Location: index.php');
                    exit;
                } else {
                    $error = 'ログインに失敗しました。(2)';
                }
            }
        } catch (PDOException $e) {
            $error = 'エラー: ' . str2html($e->getMessage());
        }
    }
}
?>

<?php include __DIR__ . '/inc/header.php'; ?>

<?php if (!empty($error)) : ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<form method="post" action="login.php">
    <p>
        <label for="username">ユーザー名:</label>
        <input type="text" name="username" id="username">
    </p>
    <p>
        <label for="password">パスワード:</label>
        <input type="password" name="password" id="password">
    </p>
    <p>
        <button type="submit">ログイン</button>
    </p>
</form>
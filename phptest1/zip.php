<?php
$zipMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $zip1 = $_POST['zip1'] ?? '';
    $zip2 = $_POST['zip2'] ?? '';
    $zipcode = $zip1 . '-' . $zip2;

    if (preg_match("/^\d{3}-\d{4}$/", $zipcode)) {
        $zipMessage = "正しい郵便番号形式です：{$zipcode}";
    } else {
        $zipMessage = "郵便番号の形式が正しくありません：{$zipcode}";
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>郵便番号フォーム</title>
</head>

<body>
    <?php if ($zipMessage): ?>
        <p><?php echo htmlspecialchars($zipMessage, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>

    <form action="" method="post" id="registration-form">
        <label for="zip1">郵便番号（3桁-4桁）</label><br />
        <input type="text" name="zip1" id="zip1" /> -
        <input type="text" name="zip2" id="zip2" />
        <br><br>
        <button type="submit" form="registration-form">送信する</button>
        <button type="button" id="changeBtn">数値変更</button>
    </form>

    <script>
        const zipCandidates = [
            "100-0001", "150-0042", "160-0022", "123-4567",
            "999-9999", "001-0001", "750-0025", "12-34567",
            "abc-defg", "0000-000"
        ];

        function setRandomZip() {
            const random = zipCandidates[Math.floor(Math.random() * zipCandidates.length)];
            const [zip1, zip2] = random.split("-");
            document.getElementById("zip1").value = zip1 || "";
            document.getElementById("zip2").value = zip2 || "";
        }

        document.getElementById("changeBtn").addEventListener("click", setRandomZip);
        setRandomZip();
    </script>
</body>

</html>
<?php
# api2.php
// zipのチェック
if (!isset($_GET['zip'])) {
    echo "zipを設定してください";
    exit;
}

$rtn = preg_match("/\A\d{7}\z/u", $_GET['zip']);
if (!isset($_GET['zip'])) {
    echo "郵便番号は7桁の数字まで入力してください。";
    exit;
}

$url = "https://zipcloud.ibsnet.co.jp/api/search?zipcode=" . $_GET['zip'];
$response = file_get_contents($url);
$response = json_decode($response, true);
var_dump($response);

// 改行
echo "<br>";
echo "入力された郵便番号は";
echo $response['results'][0]['address1'];
echo $response['results'][0]['address2'];
echo $response['results'][0]['address3'];
echo "の郵便番号です。";

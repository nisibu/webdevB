<?php
// $str = "〒450-0002愛知県名古屋市中村区名駅3-24-15";
// preg_match('/\d{3}-d{4}/u', $str, $match);
// var_dump($match);

$str = "12345678";
$rtn = preg_match("/\d{7}/u", $str);
// "/\d{7}/u"は数字の7桁のパターンを探す正規表現
$str2 = "1234567あ";
$rtn2 = preg_match("/\d{7}/u", $str2);
$str3 = "111-1234567";
$rtn3 = preg_match("/\d{7}/u", $str3);
$str4 = "111-1234567";
$rtn4 = preg_match("/\d{7}/u", $str3);

echo "結果1";
var_dump($rtn);
echo "結果2";
var_dump($rtn2);
echo "結果3";
var_dump($rtn3);
echo "結果4";
var_dump($rtn4);

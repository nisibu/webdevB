<?php
# 変数 $first = "Hello" と $second = "World" を使って、1つの文字列に結合して出力してください。
# 変数 $name = "Taro" を使って、「こんにちは、Taroさん」 と表示されるように、文字列を結合して出力してください。
# 変数 $greeting = "こんにちは" に 「、元気ですか？」 を「.=」を使って追加し、結果を表示してください。
# 文字列 "PHP"、" is "、"fun!" をそれぞれ変数に入れて、すべて結合して出力するコードを書いてください。
# 変数 $text = "" を初期化し、"A", "B", "C" を順に .= で追加して出力してください。
?>

<?php
$first = "Hello";
$second = "World";
echo $first . $second;
?>
<br>

<?php
$name = "Taro";
echo "こんにちは、" . $name . "さん";
?>
<br>

<?php
$greeting = "こんにちは";
$greeting .= "、元気ですか？";
echo $greeting;
?>
<br>

<?php
$php = "PHP";
$is = "is";
$fun = "fun";

echo $php . $is . $fun;
?>
<br>

<?php
$text = "";
$text .= "A";
$text .= "B";
$text .= "C";

echo $text;
?>
<?php
function test($b)
{
    // ローカル変数{}内の変数
    // ローカル変数に値を計算
    $a = 10 + $b;
    // 関数の戻り値
    return $a;
}
// 数字の２は引数（＄bに渡される）
// 関数の実行、＄a変数に戻り値を代入
$a = test(2);
echo $a;

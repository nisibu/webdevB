<?php
//  次の2次元配列$usersには、複数人の名前・年齢・スコアが格納されています。
//  各ユーザーについて「名前: 年齢歳, スコア: ○○, 判定: △△」の形式で1人ずつ表示するPHPコードを書きなさい。
//  判定はスコアが80以上なら「優」、60以上80未満なら「良」、それ以外は「可」とすること。
$users = [
    ['name' => 'Ken', 'age' => 20, 'score' => 85],
    ['name' => 'Yui', 'age' => 22, 'score' => 78],
    ['name' => 'Taro', 'age' => 19, 'score' => 55]
];

foreach ($users as $user) {
    $judgment = '可';
    if ($user['score'] >= 80) {
        $judgment = '優';
    } elseif ($user['score'] >= 60) {
        $judgment = '良';
    }
    echo "名前: " . $user['name'] . "、年齢 " . $user['age'] . "歳、スコア: " . $user['score'] . "、判定: " . $judgment . "<br>";
}

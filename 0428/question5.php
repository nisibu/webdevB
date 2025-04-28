<?php
# 1. 配列 ['赤', '青', '黄'] を作成し、foreach で各要素を1行ずつ表示してください。
$colors = [
    'red' => '赤',
    'blue' => '青',
    'yellow' => '黄'
];

foreach ($colors as $value) {
    echo $value . '<br>';
}

# 2. ['りんご' => 150, 'バナナ' => 120, 'みかん' => 100] の配列から「フルーツ名：価格円」と表示してください。
$fruits = [
    'りんご' => 150,
    'バナナ' => 120,
    'みかん' => 100
];

foreach ($fruits as $key => $value) {
    echo $key . ':' . $value . '円<br>';
}

# 3. [100, 200, 300] という配列の合計値を求めて表示してください（foreach を使って）。
$num = [
    100,
    200,
    300
];

$sum = 0;
foreach ($num as $value) {
    $sum += $value;
}
echo $sum . '<br>';

# 4. ['PHP', 'JavaScript', 'Python'] という配列に foreach を使って、インデックス番号と一緒に表示してください（例: 0: PHP）。
$name = ['PHP', 'JavaScript', 'Python'];
foreach ($name as $key => $value) {
    echo $key . ':' . $value . '<br>';
}

# 5. ['A', 'B', 'C'] の各要素に「さん」を付けて表示してください（例: Aさん）。
$name2 = ['A', 'B', 'C'];

foreach ($name2 as $value) {
    echo $value . 'さん' . '<br>';
}

# 6. [10, 20, 30] の各値を2倍にして出力してください。
$num2 = [10, 20, 30];

foreach ($num2 as $value) {
    echo $value * 2 . '<br>';
}

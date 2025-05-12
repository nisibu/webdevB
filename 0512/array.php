<?php

$players = [
    [
        '順位' => 1,
        '選手名' => '山本',
        'チーム名' => 'ドジャース',
        '防御率' => 1.80
    ],
    [
        '順位' => 2,
        '選手名' => 'ルサルド',
        'チーム名' => 'フィリーズ',
        '防御率' => 2.11
    ],
    [
        '順位' => 3,
        '選手名' => 'ペラルタ',
        'チーム名' => 'ブリュワーズ',
        '防御率' => 2.18
    ],
    [
        '順位' => 4,
        '選手名' => 'キング',
        'チーム名' => 'パドレス',
        '防御率' => 2.22
    ],
    [
        '順位' => 5,
        '選手名' => 'キャニング',
        'チーム名' => 'メッツ',
        '防御率' => 2.357
    ]
];

// foreach文を使って選手の名前を表示させる
foreach ($players as $player) {
    echo $player['選手名'] . "\n";
}
// 改行を追加
echo "<br>";

// 防御率が2.2以下の選手の名前をforeach文を使って表示させる
// playersの要素の数だけループする
// asのあとのprayersはplayersの要素を1つずつ取り出すための変数
foreach ($players as $player) {
    if ($player['防御率'] <= 2.2) {
        echo $player['選手名'] . "\n";
    }
}

// 改行
echo "<br>";
// この $playerStats 配列は、例えば下記のようにして利用できます：
// print_r($playerStats);

// サンリオのキャラクターで二次元配列を作成
$sanrioCharacters = [
    [
        'name' => 'ハローキティ',
        'age' => 5,
        'tame' => 'サンリオ',
    ],
    [
        'name' => 'マイメロディ',
        'age' => 3,
        'tame' => 'サンリオ',
    ],
    [
        'name' => 'シナモロール',
        'age' => 7,
        'tame' => 'サンリオ',
    ],
    [
        'name' => 'ポムポムプリン',
        'age' => 8,
        'tame' => 'サンリオ',
    ],
    [
        'name' => 'ぐでたま',
        'age' => 9,
        'tame' => 'サンリオ',
    ],
];

// foreach文を使ってキャラクターの名前を表示させる
foreach ($sanrioCharacters as $character) {
    foreach ($character as $key => $value) {
        if ($key === 'name') {
            echo $value . "\n";
        }
    }
}
// 改行を追加
echo "<br>";

// foreach文を使ってキャラクターの年齢を表示させる
foreach ($sanrioCharacters as $character) {
    foreach ($character as $key => $value) {
        if ($key === 'age') {
            echo $value . "\n";
        }
    }
}

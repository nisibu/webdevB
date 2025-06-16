<?php

// 0から100までのランダムな整数を変数$scoreに代入する。
$score = rand(0, 100);

// 「スコア: ○○」の形式でスコアを表示する。
echo "スコア: " . $score;

if ($score >= 80):
    echo "優";
elseif ($score >= 60):
    echo "良";
else:
    echo "可";
endif;

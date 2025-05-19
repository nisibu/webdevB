<?php

function str2html(string $string): string
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

if (array_key_exists('song', $_POST)) {
    $text = htmlspecialchars($_POST['song'], ENT_QUOTES, 'UTF-8');

    $fp = fopen('songs.csv', 'r');
    if ($fp === false) {
        echo 'ファイルのオープンに失敗しました。';
        exit;
    }

    echo '<h2>検索結果：「' . $text . '」</h2>';

    $found = 0;

    while (!feof($fp)) {
        $row = fgetcsv($fp);

        if (is_array($row)) {
            $matched = 0;

            if (gettype(stripos($row[0], $text)) === 'integer') {
                $matched = 1;
            } else {
                if (gettype(stripos($row[1], $text)) === 'integer') {
                    $matched = 1;
                }
            }

            if ($matched === 1) {
                echo '<ul>';
                echo '<li>曲名：' . htmlspecialchars($row[0], ENT_QUOTES, 'UTF-8') . '</li>';
                echo '<li>アーティスト：' . htmlspecialchars($row[1], ENT_QUOTES, 'UTF-8') . '</li>';
                echo '<li>ジャンル：' . htmlspecialchars($row[2], ENT_QUOTES, 'UTF-8') . '</li>';
                echo '<li>リリース年：' . htmlspecialchars($row[3], ENT_QUOTES, 'UTF-8') . '</li>';
                echo '<li>メモ：' . htmlspecialchars($row[4], ENT_QUOTES, 'UTF-8') . '</li>';
                echo '</ul>';
                $found = 1;
            }
        }
    }

    fclose($fp);

    if ($found === 0) {
        echo '<p>一致するワードが見つかりませんでした。</p>';
    }
}

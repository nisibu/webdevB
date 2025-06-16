<?php

//  functions.phpに定義された関数 greet() を読み込んで実行するコードを書いてください。エラーが出たら処理を停止させるようにしてください。

require_once 'functions.php';
try {
    greet();
} catch (Exception $e) {
    echo "エラーが発生しました: " . $e->getMessage();
}

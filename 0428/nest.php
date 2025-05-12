<?php
$people[] = ['name' => '佐藤', 'blood' => 'A'];
$people[] = ['name' => '田中', 'blood' => 'B'];
$people[] = ['name' => '加藤', 'blood' => 'C'];

var_dump($people);

echo $people[0]['blood'] . '<br>'; #A
echo $people[2]['name'] . '<br>'; #加藤


foreach ($people as $people_key => $parson) {
    echo '順番は' . $pwople_key . '<br>';
    foreach ($parson as $parson_key => $value) {
        echo 'キーは' . $parson_key . '、値は' . $value . '<br>';
    }
};

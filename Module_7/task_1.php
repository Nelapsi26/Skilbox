<?php

$searchRoot = "Test";
$searchName = "test.txt";
$searchResult = [];

function searchFile ($dir, $fileName, &$resArray) {
    foreach (scandir($dir) as $v){
        if (is_dir($dir . '/' . $v) && $v != '.' && $v != '..') {
            searchFile($dir . '/' . $v, $fileName, $resArray);
        }
        if ($v === $fileName) {
            $resArray[] = $dir . '/' . $v;
        }
    }
}

searchFile($searchRoot, $searchName, $searchResult);

if (empty($searchResult)) {
    echo "Нет совпадений \n";
} else {
    foreach ($searchResult as $v) {
        echo filesize($v) > 0 ?  $v . "\n" : "Файл \"$v\" пуст \n";
    }
}


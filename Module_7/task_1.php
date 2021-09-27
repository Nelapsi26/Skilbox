<?php

$searchRoot = "Test";
$searchName = "test.txt";
$searchResult = [];

function searchFile ($dir, $fileName, &$resArray) {
    foreach (scandir($dir) as $k => $v){
        if (is_dir($dir . '/' . $v) && $v != '.' && $v != '..') {
            searchFile($dir . '/' . $v, $fileName, $resArray);
        }
        if ($v === $fileName) {
            $resArray[] = $dir . '/' . $v;
        }
    }
}

searchFile($searchRoot, $searchName, $searchResult);

foreach ($searchResult as $k => $v) {
    if (filesize($v) > 0) {
        echo $v ;
    }
}



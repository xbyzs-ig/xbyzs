<?php

function generateRandomString($length) {
    return substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
}

echo "IG check username available\n";
echo "Author @Abby Erlangga\n";
echo "Don't forget to follow ig @xbyzs\n";
echo "\n";

$huruf = readline("Jumlah Huruf ? : ");
$jumlah = readline("Amount ? : ");
for ($i=0; $i < $jumlah ; $i++) { 

    $ngawur = generateRandomString($huruf);

    $url = "https://www.instagram.com/$ngawur/";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, true);    // we want headers
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_TIMEOUT,10);
    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpcode == 404) {
        echo "\033[32m Username Tersedia => ".$ngawur."\n";
    } else {
        echo "\033[31m Username Tidak Tersedia => ".$ngawur."\n";
    }
}


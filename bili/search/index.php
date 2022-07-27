<?php
/*
    search.php

    MediaWiki API Demos
    Demo of `Search` module: Search for a text or title

    MIT License
*/

$searchPage = $_GET['search'];

$endPoint = "https://api.bilibili.com/x/web-interface/search/all/v2";
$params = [
    "page" => "1",
    "keyword" => $searchPage,
];

$url = $endPoint . "?" . http_build_query( $params );

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$output = curl_exec( $ch );
curl_close( $ch );

$result = json_decode( $output, true );
/*
if ($result['query']['search'][0]['title'] == $searchPage){
    echo("索尼克百科搜索结果:\n" . $searchPage );
}
*/
echo("B站搜索结果 (最多展示10个):");
foreach( $result["data"]["result"]["data"] as $rc ){
    echo( "\n[[" . $rc["title"] . "]]" );
}
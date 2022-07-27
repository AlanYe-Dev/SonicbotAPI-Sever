<?php
/*
    search.php

    MediaWiki API Demos
    Demo of `Search` module: Search for a text or title

    MIT License
*/

$searchPage = $_GET['search'];

$endPoint = "https://sonic.wiki/api.php";
$params = [
    "action" => "query",
    "list" => "search",
    "srlimit" => 5,
    "srsearch" => $searchPage,
    "format" => "json"
];

$url = $endPoint . "?" . http_build_query( $params );

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$output = curl_exec( $ch );
curl_close( $ch );

$result = json_decode( $output, true );

$title2url = "/title2url/";


echo("索尼克百科搜索结果 (最多展示5个):");
foreach( $result["query"]["search"] as $rc ){
    $titleparams = [
      "title" => $rc["title"]
    ];
    $realurl = $title2url . "?" . http_build_query( $titleparams );
    $fetchTheURL = curl_init( $realurl );
    curl_setopt( $fetchTheURL, CURLOPT_RETURNTRANSFER, true );
    $outputURL = curl_exec( $fetchTheURL );
    curl_close( $fetchTheURL );
    echo( "\n[[" . $rc["title"] . "]]\n" . $outputURL );
}

#echo("是的！！！");
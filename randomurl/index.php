<?php
/*
    get_random.php

    MediaWiki API Demos
    Demo of `Random` module: Get request to list 5 random pages.

    MIT License
*/

$endPoint = "https://sonic.wiki/api.php";
$params = [
    "action" => "query",
    "format" => "json",
    "list" => "random",
    "rnnamespace" => "0",
    "rnlimit" => "1"
];

$url = $endPoint . "?" . http_build_query( $params );

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$output = curl_exec( $ch );
curl_close( $ch );

$result = json_decode( $output, true );

foreach( $result["query"]["random"] as $k => $v ) {
    echo( "索尼克百科随机页面: \n[[" . $v["title"] . "]]" );
}
<?php
/*
    get_recent_changes.php

    MediaWiki API Demos
    Demo of `RecentChanges` module: Get the three most recent changes with sizes and flags

    MIT License
*/

$endPoint = "https://sonic.wiki/api.php";
$params = [
    "action" => "query",
    "list" => "recentchanges",
    "rcprop" => "title|ids|sizes|flags|user",
    "rclimit" => "5",
    "format" => "json"
];

$url = $endPoint . "?" . http_build_query( $params );

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$output = curl_exec( $ch );
curl_close( $ch );

$result = json_decode( $output, true );
echo("索尼克百科最近更改: \n");
foreach( $result["query"]["recentchanges"] as $rc ){
    echo( "[[" . $rc["title"] . "]]\n" );
}
<?php
/*
    search.php

    MediaWiki API Demos
    Demo of `Search` module: Search for a text or title

    MIT License
*/

$titleName = $_GET['title'];
$encodedTitle = urlencode( $titleName );
#echo ( "https://sonic.wiki/wiki/" . $titleName );
echo ( "https://sonic.wiki/wiki/" . $encodedTitle );


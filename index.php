<title>IPTV Search - Riverside Rocks</title>
<br>
<h1>IPTV Station Search</h1>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/siimple@3.3.1/dist/siimple.min.css"
    />
    <style>
    a{
        text-decoration: none;
    }
    body{
        background-color: black;
    }
    input[type=text]{
        padding: 15px;
        font-size: 16px;
        width: 35%;
    }
    button[type=submit]{
        padding: 15px;
    }
    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<center>
<br>
<form method="get"><input type="text" placeholder="Search.." name="q"><button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button></form>
<?php

/*

Copyright 2020 Riverside Rocks (riverside.rocks or github.com/RiversideRocks)

Under Apache 2.0 License

*/


$get = file_get_contents("https://iptv-org.github.io/iptv/channels.json");

$json = json_decode($get, true);

$y = 0;
$x = 10000;
$results = 0;

while($x > $y){
    $link = $json[$y]["url"];
    $channel = $json[$y]["name"];
    $img = $json[$y]["logo"];
    $logo = "<img src='${img}' height='55px;' width='75px;' />";
    if(isset($_GET['q'])){
        if(strpos($channel, $_GET['q']) !== false){
            echo "<div style='width:30%;'><a href='${link}'><div class='siimple-box siimple-box--primary'><div class='siimple-box-title'>${channel}</div><div class='siimple-box-subtitle'>${logo}</div></div></a></div><br><br>";
            echo "<br>";
            $results = $results + 1;
        }
    }else{
        die("Get started by searching for a channel.");
    }
    $y = $y + 1;
}


echo "Found ${results} stations.<br>";
echo "<i>Data from https://iptv-org.github.io</i>";

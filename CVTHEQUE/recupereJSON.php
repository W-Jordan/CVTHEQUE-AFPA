<?php
header('Content-type: application/json');
$json = file_get_contents("./cvtheque.json");
echo $json;

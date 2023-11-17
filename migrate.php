<?php
require_once __DIR__ . "/vendor/autoload.php";
$database = new \app\src\Database();
$database->connect();
$database->migrate();
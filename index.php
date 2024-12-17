<?php
require "functions.php";
require "router.php";
require "Database.php";
$config = require "config.php";

$id = $_GET["id"];

$db = new Database($config["database"]);
<?php
include_once("show_errors.php");

try {
    $file_db = new PDO('sqlite:sample.sqlite3');
}catch(PDOException $e) {
	echo $e->getMessage();
	die();
};
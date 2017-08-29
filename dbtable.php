<?php
include_once("dbcon.php");

$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$file_db->exec  ("
                CREATE TABLE IF NOT EXISTS tasks 
                (id INTEGER PRIMARY KEY,
                 username VARCHAR(32), 
                 password VARCHAR(32))
                 ");

                 
function check_user($file_db,$username,$password){
    $insert = "SELECT COUNT(*) FROM tasks WHERE username=:username AND password=:password";
    $stmt = $file_db->prepare($insert);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $result=$stmt->fetchAll();
    $user_exists=$result[0][0];
    return $user_exists; 
};
<?php
include_once("dbtable.php");
include_once("db.php");

if(isset($_GET["id"])){
    $id= $_GET["id"];
    try{
        $stmt =$file_db->prepare("DELETE FROM tasks WHERE id=?");
        $stmt->execute(array($id));
        header("location:edit.php");
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>
<?php
include_once("dbcon.php");


$message="";


if(isset($_POST['update'])){
    $id=$_POST['text_id'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    if(!empty($username)){
        try{
            $stmt = $file_db->prepare("UPDATE tasks set username=:username,
                                                        password=:password
                                                  WHERE id=:id");
            $stmt->execute(array(":username"=>$username,":password"=>$password, ":id"=>$id));
            if($stmt){
            header("Location:edit.php");
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }else{
        echo "INPUT NAME";
    }

    
} 
    $s_id=0;
    $name="";
    $password="";
    if(isset($_GET["id"])){
        
        $id= $_GET["id"];
        $stmt = $file_db->prepare("SELECT * FROM tasks WHERE id = :id");
        
        $stmt->execute(array(":id"=>$id));
        $row = $stmt->fetch();
       
        $s_id=$row["id"]; 
        $username=$row["username"];
        $password=$row["password"];
    }
    
?>
<html>
<head>
    <title>
    </title>
</head>
<body>
<div class="container">
            <div style="width:500px; margin:0 auto;">
                <form method="post" action="" autocomplete="off">
                <center><h2>edit add</h2></center>
                <hr/> 
                <?php echo $message ?>
                    <div class="form-group">
                   
                        <label for="username" class="control-label">username   :</label>
                        <input type="username" name="username" value="<?=$username;?>"class="control-label" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Password  :</label>
                        <input type="password" name="password" value="<?=$password;?>"class="control-label" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <center>
                            <input type="hidden" name="text_id" value="<?=$s_id;?>">
                            <input type="submit" name="update"value="update" class="btn btn-primary">
                        </center>
                    </div>
                <hr/>
                <a href="index.php">Login</a>
                </form>
            </div>
        </div>
</body>
</html>
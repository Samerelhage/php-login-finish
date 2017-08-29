<?php
include_once("dbcon.php");



$message="";


if(isset($_POST['register'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];
    if(strlen($username) > 6){
        if($password==$confirm){
            if(!empty($username)){
                try{
                    $stmt = $file_db->prepare("INSERT INTO tasks(username,password) VALUES(:username ,:password)");
                    $stmt->execute(array(':username'=>$username,"password"=>$password));
                    header("Location:welcome-register.php");
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
            }else{
                echo "INPUT NAME";
                }
        
                    $s_id=0;
                    $name="";
                    $password="";
                    if(isset($_POST['id'])){
                        $id= $_GET['id'];
                        $stmt = $file_db->prepare("SELECT * FROM tasks WHERE id=:id");
                        $stmt->execute(array(":id=>$id"));
                        $row = $stmt->fetch();
                        $s_id=$row["id"]; 
                        echo $s_id;
                    }else{
                        echo"password nut confirm";
                        }
            }
            }else{
                echo"Input is too short, minimum is 6 characters ";
                }
};
//
//if(empty($_POST)){
//    // user has submit the form
//    $message="please register bro";
//}else{   
//    // user has not submit the form
//    $message=check_length($file_db,$username,$password,$confirm);
//}
//
//function check_length($file_db,$username,$password,$confirm){
//    if (strlen($username) < 6){
//        return "Input is too short, minimum is 6 characters .";
//    }elseif($password!==$confirm){
//        return "your password not confirm";
//    }else{
//        include_once("insert.php");
//        insert($file_db,$username,$password,$confirm);
//        header('Location:welcome-register.php');
//        exit();
//    }
//};
//
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
                <center><h2>REGISTER</h2></center>
                <hr/> 
                <?php echo $message ?>
                    <div class="form-group">
                   
                        <label for="username" class="control-label">username   :</label>
                        <input type="username" name="username" class="control-label" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Password  :</label>
                        <input type="password" name="password" class="control-label" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="confirm" class="control-label">confirm  :</label>
                        <input type="confirm" name="confirm" class="control-label" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <center><input type="submit" name="register"value="register" class="btn btn-primary"></center>
                    </div>
                <hr/>
                <a href="index.php">Login</a>
                </form>
            </div>
        </div>
</body>
</html>
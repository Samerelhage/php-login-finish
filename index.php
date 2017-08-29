<?php
include_once("show_errors.php");
include_once("dbcon.php");
include_once("dbtable.php");

$message="";

if(empty($_POST)){
    $message="please enter username";
}else{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $user_exists_and_has_right_password=check_user($file_db,$username,$password);

    if($user_exists_and_has_right_password == 1){
        header('Location: welcome.php');
        exit;
    }else{
        $message= "wrong password";
    };
    
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
                <center><h2>LOGIN</h2></center>
                <hr/>
                    <?php echo $message?>
                    <div class="form-group">
                        <label for="username" class="control-label">username   :</label>
                        <input type="username" name="username" class="control-label" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Password  :</label>
                        <input type="password" name="password" class="control-label" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <center><input type="submit" value="Login" class="btn btn-primary"></center>
                    </div>
                <hr/>
                <a href="register.php">Register</a>  |
                <a href="edit.php">Edit</a>
                </form>
            </div>
        </div>
</body>
</html>
<?php
include_once("db.php");
include_once("dbtable.php");





?>
<html>
<head>
<title> edit </title>
</head>
<body>
<h2>student list</h2>
<table border="1px" cellpadding="5px" cellspacing="0">
        <tr>
            <th>id</th>
            <th>username</th>
            <th>password</th>
            <th>action</th>
        </tr>
        <?php
            $stmt = $file_db->prepare("SELECT * FROM tasks ORDER BY id ASC");
            $stmt->execute();
            $result = $stmt->fetchALL();
            foreach($result as $row){
        ?>
            <tr>
                <td><?=$row["id"];?></td>
                <td><?=$row["username"];?></td>
                <td><?=$row["password"];?></td>
                <td>
                    <a href="addedit.php?id=<?=$row['id'];?>">edit</a> |
                    <a href="">delet</a>
            </tr>
        <?php
            }
        ?>
</table>



</body>
</html>
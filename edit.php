<?php
include_once("db.php");
include_once("dbtable.php");





?>
<html>
<head>
<title> Edit </title>
</head>
<body>
<h2>Data List</h2>
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
                    <a href="videopdo.php?id=<?=$row['id'];?>">edit</a> |
                    <a href="delete.php?id=<?=$row['id'];?>">delete</a>
            </tr>
        <?php
            }
        ?>
</table>



</body>
</html>
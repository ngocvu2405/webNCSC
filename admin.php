<?php
    session_start();
?>

<!DOCTYPE html>
<html>

    <head>
        <title> ADMIN PAGE </title>
        <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
    </head>

    <body>
        <?php
            require("../.../database/connect.php");
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if($row['is_admin'] != 1){
                header('location:../home.php?err=notadmin');
            }
        ?>

        <form action = "../home.php" method= "GET"><button type = "submit"> Trang chủ </button></form>
        <form action = "adminproc.php" name = "search" method= "POST">
            <select name = "user">
                <?php
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option value ='".$row['username']."'>".$row['username']." (".($row['is_admin'] == 1 ? 'admin': 'normal').")</option>";
                        echo "</hr>";
                        echo "<b> ID: </b>" .$row['ID']."<br>";
                        echo "<b> Tiêu đề: </b>" .$row['title']."<br>";
                        echo "<b> Ngày đăng: </b>" .$row['date']. "<br>";
                        echo "<b> Nội dung: </b> <pre>" .$row['post']. "</pre>";
                        if($row['username']){
                            echo "<a href = '../postmodify.php?ID=".$row['ID']."''>Edit</a><br>";
                            echo "<a href = '../deletepost.php?ID=".$row['ID']."''>Delete</a><br>";
                        }
                    }
                ?>
            </select>
            <button name = 'action' value = 'upgrade' type = 'submit'> Cấp quyền tài khoản </button>
            <button name = 'action' value = 'downgrade' type = 'submit'> Huỷ cấp quyền </button>
            <button name = 'action' value = 'delete' type = 'submit'> Xoá tài khoản </button>
            <br><br>
        </form>
        
        <?php 
            include("../footer.php");
        ?>
    </body>

</html>

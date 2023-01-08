<?php
    session_start();
    if (isset($_SESSION['username'])){
        header("location:homepage/home.php");
    }
?>

<!DOCTYPE html>
<html>

    <head>
        <title> HOME PAGE </title>
        <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
    </head>

    <body>
        <h1> Xin chào bạn đã đến với Website!!! </h1><br><br>
        <a href ="login.php"> Đăng nhập </a>
        <a href="signup.php"> Đăng ký </a> <br><br>
        <form action = "homepage/search.php" name = "search" method = "GET">
            <input type ="text" name = "search" placeholder = "Tìm kiếm thông tin">
            <select name = "seach_for">
                <option value = "user"> Username </option>
                <option value = "post"> Bài đăng </option>
            </select> <br> <br>
            <button type = "submit"> Tìm kiếm </button>
        </form>
        <?php
            if(isset($_GET['message'])){
                $message = $_GET['message'];
                if($message == 'signupsucess'){
                    echo "Đăng ký thành công!";
                }
                if($message == 'nologin'){
                    echo "Bạn chưa đăng nhập.";
                }
            }
        ?>
    </body>
</html>
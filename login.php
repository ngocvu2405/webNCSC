<?php
    session_start();
    if (isset($_SESSION['username'])){
        header("location:hompage/home.php");
    }
?>

<!DOCTYPE html>
<html>

    <head>
        <title> LOGIN </title>
        <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
    </head>

    <body>
        <h1><b> ĐĂNG NHẬP </h1></b>
        <form action = "procedure/loginproc.php" method = "POST">
            <b> Username: </b> <input type = "text" name = "username" placeholder = "username" 
                value = "<?php 
                    if(isset($_COOKIE["username"])){
                        echo $_COOKIE["username"]; 
                    } 
                ?>"> <br> <br>
            <b> Password: </b> <input type = "password" name = "password" placeholder= "password" 
                value = "<?php
                    if(isset($_COOKIE["password"])){
                        echo $_COOKIE["password"]; 
                    }
                ?>">
            <br><br>
            <input type = "checkbox" name = "remember"> Lưu đăng nhập <br><br>
            <input type = "submit" name = "submit"> 
        </form>
        <?php
            if(isset($_GET['error'])){
                $error = $_GET['error'];
                if($error == "nologin"){
                    echo "Bạn chưa đăng nhập.";
                }
                if($error == "emptyinput"){
                    echo "Bạn chưa điền username/password";
                }
                if($error == "wrongpassword"){
                    echo "Sai mật khẩu";
                }
            }
        ?>
        <br>
        <form action = "index.php" method = "GET">
            <button> Trở lại trang chủ </button>
        </form>
    </body>
</html>
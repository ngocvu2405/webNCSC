<?php
    session_start();
    if (isset($_SESSION['username'])){
        header("location:homepage/home.php");
    }
?>

<!DOCTYPE html>
<html>

    <head>
        <title> SIGN UP </title>
        <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
    </head>
   <body>
        <h1> <b> ĐĂNG KÝ </b></h1>
        <form action = "procedure/signupproc.php" method = "POST">
            <table>
                <tr>
                    <td> <b> Tên: </b> </td> <td> <input type = "text" name = "name" placeholder= "Họ và tên"> <br> </td>
                </tr>
                <tr>
                    <td> <b> Email: </b> </td> <td> <input type = "text" name = "email" placeholder= "Email"> <br> </td>
                </tr>
                <tr>
                    <td> <b> Username: </b> </td> <td><input type = "text" name = "username" placeholder= "Username"> <br> </td>
                </tr>
                <tr>
                    <td> <b> Mật khẩu: </b> </td> <td><input type = "password" name = "password" placeholder= "Password"> <br> </td>
                </tr>
                <tr>    
                    <td> <b> Nhập lại mật khẩu: </b> </td> <td><input type = "password" name = "confirm_password" placeholder= "Kiểm tra mật khẩu"> <br> </td>
                </tr>
                <td>
                    <input type = "submit" name = "submit">
                </td>
            </table>
        </form>
        <?php
            if(isset($_GET['error'])){
                $err = $_GET['error'];
                if($err == "nosignup"){
                    echo "Bạn chưa đăng ký <br>";
                }
                if ($err == "emptyInputSignup"){
                    echo "Điền thông tin còn thiếu";
                }
                if ($err == "user_exists"){
                    echo "Tài khoản đã tồn tại";
                }
                if ($err == "password_nomatches"){
                    echo "Mật khẩu không khớp";
                }
                if ($err == "invalidname"){
                    echo "Tên không hợp lệ";
                }
                if ($err == "invalidemail"){
                    echo "Email không hợp lệ";
                }
                if ($err == "emailexists"){
                    echo "Email đã tồn tại";
                }    
            }
        ?>
        <br>
        <form action = "index.php" method = "GET">
            <button> Trở lại trang chủ </button>
        </form>
   </body>
</html>
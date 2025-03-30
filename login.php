<?php 
session_start();

if(isset($_COOKIE['remember'])){
    require 'admin/root.php';
    $token = $_COOKIE['remember'];
    $sql = "SELECT * from customers
    where `token` = '$token' limit 1";
    $result = mysqli_query($connect, $sql);
    $number_rows = mysqli_num_rows($result);
    if($number_rows){
        $each = mysqli_fetch_array($result);
        $_SESSION['id'] = $each['id'];
        $_SESSION['name'] = $each['name'];
    }
}

if(isset($_SESSION['id'])){
    header('location:index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./public/css/rss.css" />
    <link rel="stylesheet" href="./public/css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <style>
        .h1 {
            flex: 4;
            color: #ffff;
        }
        
        .logo::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            z-index: -1;
            filter: blur(8px);
            animation: glow 3s infinite alternate;
        }

        @keyframes glow {
            0% {
                opacity: 0.5;
                filter: blur(8px);
            }
            100% {
                opacity: 0.8;
                filter: blur(12px);
            }
        }
        
        .container {
            padding-top: 80px;
            padding-bottom: 40px;
        }
        
        .login-container {
            display: flex;
            max-width: 900px;
            margin: 0 auto;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
            background-color: #fff;
        }
        
        .login-image {
            flex: 1;
            background: url('./public/img/login-bg.jpg') center/cover no-repeat;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
            padding: 30px;
        }
        
        .login-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
        }
        
        .login-image h2 {
            position: relative;
            font-size: 28px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .login-image p {
            position: relative;
            font-size: 16px;
            text-align: center;
            line-height: 1.6;
        }
        
        .login-form {
            flex: 1;
            padding: 40px;
            background-color: #fff;
        }
        
        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .form-header h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 10px;
        }
        
        .form-header p {
            color: #777;
            font-size: 14px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
            color: #333;
        }
        
        .form-control {
            width: 100%;
            height: 45px;
            padding: 0 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: #eb1f27;
            box-shadow: 0 0 0 3px rgba(235, 31, 39, 0.1);
        }
        
        .remember-forgot {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
        }
        
        .remember-me input {
            margin-right: 8px;
            width: 16px;
            height: 16px;
        }
        
        .forgot-password {
            color: #eb1f27;
            text-decoration: none;
        }
        
        .forgot-password:hover {
            text-decoration: underline;
        }
        
        .btn-login {
            display: block;
            width: 100%;
            height: 45px;
            background-color: #eb1f27;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 20px;
        }
        
        .btn-login:hover {
            background-color: #d01b22;
        }
        
        .form-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
        
        .form-footer a {
            color: #eb1f27;
            text-decoration: none;
            font-weight: 500;
        }
        
        .text-status {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 14px;
            text-align: center;
        }
        
        .text-error {
            background-color: rgba(255, 0, 0, 0.1);
            color: #d01b22;
        }
        
        .text-success {
            background-color: rgba(0, 128, 0, 0.1);
            color: green;
        }
        
        .social-login {
            margin-top: 30px;
            text-align: center;
        }
        
        .social-login p {
            color: #777;
            font-size: 14px;
            margin-bottom: 15px;
            position: relative;
        }
        
        .social-login p::before,
        .social-login p::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 35%;
            height: 1px;
            background-color: #ddd;
        }
        
        .social-login p::before {
            left: 0;
        }
        
        .social-login p::after {
            right: 0;
        }
        
        .social-icons {
            display: flex;
            justify-content: center;
        }
        
        .social-icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin: 0 10px;
            font-size: 18px;
            color: #fff;
            transition: all 0.3s;
        }
        
        .social-icons a:nth-child(1) {
            background-color: #3b5998;
        }
        
        .social-icons a:nth-child(2) {
            background-color: #db4437;
        }
        
        .social-icons a:nth-child(3) {
            background-color: #1da1f2;
        }
        
        .social-icons a:hover {
            transform: translateY(-3px);
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- dau -->
        <div class="header header-fixed">
            <div class="header-container">
                <header class="header-top">
                    <div class="logo" style="position: relative;">
                        <a href="index.php" style="font-size: 32px; color: white; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
                            <i class="fas fa-bolt" style="color:rgb(255, 0, 0); margin-right: 5px;"></i>SHOP<span style="color:rgb(255, 0, 0);">DIENTU</span>
                        </a>
                    </div>
                    <div class="h1" style="text-align: center; flex: 1;">
                        <h1 style="color: white; font-size: 24px; margin: 0;">Đăng Nhập</h1>
                    </div>
                </header>
            </div>
        </div>
        <div class="container">
            <div class="login-container">
                <div class="login-image">
                    <h2>Chào mừng trở lại!</h2>
                    <p>Đăng nhập để tiếp tục mua sắm và kiểm tra thông tin đơn hàng của bạn.</p>
                </div>
                <div class="login-form">
                    <div class="form-header">
                        <h2>Đăng Nhập</h2>
                        <p>Đăng nhập bằng thông tin tài khoản của bạn</p>
                    </div>
                    
                    <?php if (isset($_SESSION['error'])) { ?>
                        <div class="text-status text-error">
                            <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['success'])) { ?>
                        <div class="text-status text-success">
                            <?php
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                            ?>
                        </div>
                    <?php } ?>
                    
                    <form method="post" action="process_login.php">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Nhập địa chỉ email">
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu">
                        </div>
                        
                        <div class="remember-forgot">
                            <div class="remember-me">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">Nhớ mật khẩu</label>
                            </div>
                            <a href="forgot_password.php" class="forgot-password">Quên mật khẩu?</a>
                        </div>
                        
                        <button type="submit" class="btn-login">Đăng Nhập</button>
                        
                        <div class="form-footer">
                            Bạn chưa có tài khoản? <a href="signup.php">Đăng ký ngay</a>
                        </div>
                    </form>
                    
                    <div class="social-login">
                        <p>Hoặc đăng nhập bằng</p>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-google"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include './partials/footer.php' ?>
    </div>
</body>

</html>
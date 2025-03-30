<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="./public/css/rss.css" />
    <link rel="stylesheet" href="./public/css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <style>
        label.error{
			color: red;
            font-size: 12px;
            margin-top: 5px;
            display: block;
		}
        
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
        
        .sign-container {
            display: flex;
            max-width: 900px;
            margin: 0 auto;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
            background-color: #fff;
        }
        
        .sign-image {
            flex: 1;
            background: url('./public/img/signup-bg.jpg') center/cover no-repeat;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
            padding: 30px;
        }
        
        .sign-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
        }
        
        .sign-image h2 {
            position: relative;
            font-size: 28px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .sign-image p {
            position: relative;
            font-size: 16px;
            text-align: center;
            line-height: 1.6;
        }
        
        .sign-form {
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
        
        .select-control {
            width: 100%;
            height: 45px;
            padding: 0 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            background-color: #fff;
        }
        
        .btn-submit {
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
            margin-top: 20px;
        }
        
        .btn-submit:hover {
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
                        <h1 style="color: white; font-size: 24px; margin: 0;">Đăng Ký Tài Khoản</h1>
                    </div>
                </header>
            </div>
        </div>
        <!-- giua -->
        <div class="container">
            <div class="sign-container">
                <div class="sign-image">
                    <h2>Welcome to SHOPDIENTU</h2>
                    <p>Đăng ký tài khoản để trải nghiệm mua sắm tốt nhất và nhận các ưu đãi độc quyền dành cho thành viên.</p>
                </div>
                <div class="sign-form">
                    <div class="form-header">
                        <h2>Tạo Tài Khoản</h2>
                        <p>Điền thông tin của bạn bên dưới để tạo tài khoản mới</p>
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
                    
                    <form id="form_signup" method="post" action="process_signup.php">
                        <div class="form-group">
                            <label for="name">Họ và tên</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nhập họ và tên của bạn">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Nhập địa chỉ email của bạn">
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Tạo mật khẩu mới">
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập số điện thoại của bạn">
                        </div>
                        
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ của bạn">
                        </div>
                        
                        <div class="form-group">
                            <label for="gender">Giới tính</label>
                            <select id="gender" name="gender" class="select-control">
                                <option selected="selected" value="1">Nam</option>
                                <option value="0">Nữ</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn-submit">Đăng Ký Ngay</button>
                        
                        <div class="form-footer">
                            Đã có tài khoản? <a href="login.php">Đăng nhập</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include './partials/footer.php' ?>
    </div>
</body>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $().ready(function() {
        $("#form_signup").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "name": {
                    required: true,
                    maxlength: 15
                },
                "email": {
                    required: true,
                    email: true
                },
                "password": {
                    required: true,
                    validatePassword: true,
                    minlength: 6
                },
                "phone": {
                    required: true,
                    validatePhone: true,
                },
                address: "required",
            },
            messages: {
                "name": {
                    required: "Vui lòng nhập tên của bạn",
                    maxlength: "Nhập tối đa 15 kí tự"
                },
                "email": {
                    required: "Vui lòng nhập email của bạn",
                    email: "Eamil không đúng định dạng!!"
                },
                "password": {
                    required: "Vui lòng nhập mật khẩu của bạn"
                },
                "phone": {
                    required: "Vui lòng nhập số điện thoại của bạn",
                },
                "address": {
                    required: "Vui lòng nhập địa chỉ của bạn"
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
        $.validator.addMethod("validatePassword", function(value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,16}$/i.test(value);
        }, "Hãy nhập password từ 6 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số");
        $.validator.addMethod("validatePhone", function(value, element) {
            return this.optional(element) || /^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/i.test(value);
        }, "Vui lòng nhập đúng định dạng số điện thoại!!");
    });
</script>

</html>
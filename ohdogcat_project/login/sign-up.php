<?php
session_start();
require("../db-connect.php");
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
    header("location:../dashboard/");
}
?>

<!doctype html>
<html lang="en">
   
<head>
    <title>Sign Up</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        body {
            background: url("./img/login-bg.svg") right 93% / 440px no-repeat,linear-gradient(152deg, rgb(212, 237, 237) 0%, rgba(212, 237, 237, 0.4) 40%, rgb(255, 170, 107,0.8) 100%);
            height: 100%;
            width: 100%;
            background-size: auto;
            color: #222934;
        }

        .panel {
            /*整個的寬 */
            min-width: 300px;
            width: 25%;

        }

        .frame {
            padding: 4%;
            background: white;
            border-radius: 19px;
        }

        .logo {
            width: 70%;
        }

        .un-styled {
            text-decoration: none;
            color: #000;
        }
                /*眼睛*/
                #checkEye,#REcheckEye {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
        }
    </style>
</head>

<body>
    <div class="vh-100 d-flex justify-content-center align-items-center aa">
        <div class="panel px-2">
            <div class="text-center">
            <img class="logo" src="./img/logo.svg" alt="">
            </div>
            <div class="frame">
                <div class="text-center">
                    <h1 style="font-weight:600" class="h2 mt-2">註冊會員</h1>
                </div>
                <!-- 送出表單 -->
                <form action="./doSignUp.php" method="post">
                    <div class="form-floating ">
                        <input name="account" type="text" class="form-control input-top " id="floatingInput" placeholder="會員帳號" required>
                        <label for="floatingInput">會員帳號</label>
                    </div>
                    <div class="form-floating">
                    <input name="password" type="password" class="form-control input-top mt-2" id="floatingPassword" placeholder="密碼" required>
                        <label for="floatingInput">密碼</label>
                        <i id="checkEye" class="fas fa-eye"></i>
                    </div>
                    <div class="form-floating">
                        <input name="repassword" type="password" class="form-control input-top mt-2" id="REfloatingPassword" placeholder="再輸入一次密碼" required>
                        <label for="floatingInput">再輸入一次密碼</label>
                        <i id="REcheckEye" class="fas fa-eye"></i>
                    </div>
                    <div class="form-floating">
                        <input name="email" type="email" class="form-control input-top mt-2" id="floatingInput" placeholder="電子信箱" required>
                        <label for="floatingInput">電子信箱</label>
                    </div>

                    <!-- 密碼不一致錯誤時警示 -->
                    <div class="mt-3 mb-3 d-flex">
                        <?php if (isset($_SESSION["error1"])) :  ?>
                            <div class="text-danger"><?= $_SESSION["error1"]["ACFalse"] ?></div>
                        <?php endif; ?>
                        <?php if (isset($_SESSION["error2"])) :  ?>
                            <div class="text-danger"><?= $_SESSION["error2"]["PWfalse"] ?></div>
                        <?php endif; ?>
                    </div>

                    <!-- 送出註冊 -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn" style="background-color:#FFC845;font-weight:700;">送出</button>
                    </div>
                </form>
                <!-- 以註冊直接登入 -->
                <div class="d-grid gap-2 mb-2">
                    <a href="./login.php" class=" btn mt-3" style="background-color:#D5EEEE;width:100%;font-weight:700;">直接登入</a>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
        var checkEye = document.getElementById("checkEye");
        var floatingPassword = document.getElementById("floatingPassword");
        var REcheckEye = document.getElementById("REcheckEye");
        var REfloatingPassword = document.getElementById("REfloatingPassword");

        checkEye.addEventListener("click", function(e) {
            if (e.target.classList.contains('fa-eye')) {
                e.target.classList.remove('fa-eye');
                e.target.classList.add('fa-eye-slash');
                floatingPassword.setAttribute('type', 'text')
            } else {
                floatingPassword.setAttribute('type', 'password');
                e.target.classList.remove('fa-eye-slash');
                e.target.classList.add('fa-eye')
            }
        });
        REcheckEye.addEventListener("click", function(event) {
            if (event.target.classList.contains('fa-eye')) {
                event.target.classList.remove('fa-eye');
                event.target.classList.add('fa-eye-slash');
                REfloatingPassword.setAttribute('type', 'text')
            } else {
                REfloatingPassword.setAttribute('type', 'password');
                event.target.classList.remove('fa-eye-slash');
                event.target.classList.add('fa-eye')
            }
        });
    </script>
</body>

</html>
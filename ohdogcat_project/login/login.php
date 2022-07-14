<?php
session_start();
if (isset($_SESSION["user"])) {
    header("location: ../dashboard");
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Sign in</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="icon" href="../images/store_photo/Sample_User_Icon.svg" type="image/x-icon"/>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&display=swap');

        body {
            background: url("./img/login-bg.svg") right 93% / 440px no-repeat,linear-gradient(152deg, rgb(212, 237, 237) 0%, rgba(212, 237, 237, 0.4) 40%, rgb(255, 170, 107,0.8) 100%);
            height: 100%;
            width: 100%;
            background-size: auto;
            color: #222934;
        }
        .sign-up-panel {
            width: 20%;
        }

        .logo {
            width: 40%;
        }

        .input-top {
            border-radius: 0.375rem 0.375rem 0 0;
            border-bottom: 0;
        }

        .input-bottom {
            border-radius: 0 0 0.375rem 0.375rem;
        }

        .form-bg {
            background: white;

        }

        .form-floating>label {
            z-index: 2;
        }

        .form-control {
            position: relative;
        }

        .form-control:focus {
            z-index: 1;
        }

        .un-styled {
            text-decoration: none;
            color: #000;
        }

        .frame {
            padding: 4%;
            background: white;
            border-radius: 19px;
        }
        #checkEye {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
        }
    </style>

</head>

<body style="overflow-y: hidden;">
    <div class="vh-100 mt-2  d-flex justify-content-center align-items-center">
        <div class="sign-up-panel">
            <!-- 登入太多次數讓他連表單都看不到 -->
            <?php if (isset($_SESSION["error"]) && $_SESSION["error"]["times"] >= 5) : ?>
                <div class="text-center">
                    <h2 class="text-danger" style="font-weight:600 ;">還沒註冊會員嗎?</h2>
                </div>
            <?php else : ?>
                <!-- 送出表單 -->
                <div class="text-center">
                    <img class="logo" src="./img/login-dog.svg" alt="">
                </div>
                <div class="frame">
                    <div class="text-center">
                        <h1 style="font-weight:600" class="h2 mt-2">登入找我玩耍吧</h1>
                    </div>
                    <form action="doLogin.php" method="post">
                        <div class="form-floating">
                            <input name="account" type="text" class="form-control input-top" id="floatingInput" placeholder="會員帳號" required>
                            <label for="floatingInput">會員帳號</label>
                        </div>
                        <div class="form-floating">
                            <input name="password" type="password" class="form-control input-bottom" id="floatingPassword" placeholder="密碼" required>
                            <label for="floatingInput">密碼</label>
                            <i id="checkEye" class="fas fa-eye"></i>
                        </div>
                        <div class="mt-3 mb-2 d-flex">
                            <?php if (isset($_SESSION["error"])) : ?>
                                <div class="text-danger"><?= $_SESSION["error"]["message"] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn" style="background-color:#FFC845;font-weight:700;" type="submit">登入</button>
                        </div>
                    <?php endif; ?>
                    </form>

                    <div class="d-grid gap-2">
                        <a href="./sign-up.php">
                            <button class="btn mt-3" style="background-color:#D5EEEE;width:100%;font-weight:700;" type="text">來去註冊</button>
                        </a>
                    </div>
                </div>
        </div>
    </div>

    </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
    <script>
        var checkEye = document.getElementById("checkEye");
        var floatingPassword = document.getElementById("floatingPassword");

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
    </script>
</html>
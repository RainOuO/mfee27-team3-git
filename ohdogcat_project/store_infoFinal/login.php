<?php
session_start();
if(isset($_SESSION["user"])){
    header("location: dashboard.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Sign in</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        
        body{
            background: url("chinese.jpg") repeat round;
            background-size: cover;
        }
        .sign-up-panel {
            width: 280px;
        }

        .logo {
            height: 64px;
        }

        .input-top {
            border-radius: 0.375rem 0.375rem 0 0;
            border-bottom: 0;
        }

        .input-bottom {
            border-radius: 0 0 0.375rem 0.375rem;
        }
        .form-floating>label{
            z-index: 2;
        }
        .form-control{
            position: relative;
        }
       .form-control:focus{
            z-index: 1;
       }
    </style>

</head>

<body>
<div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="sign-up-panel">
            <?php if(isset($_SESSION["error"]) && $_SESSION["error"]["times"]>5): ?>
                <h2 class="text-danger">您已嘗試錯誤超過 5 次, 請稍後再登入</h2>
            <?php else: ?>
            <form action="doLogin.php" method="post">
                <div class="text-center">
                    <img class="logo" src="/images/bootstrap-logo.svg" alt="">
                    <h1 class="h2 mt-2">Please sign in</h1>
                </div>
                <div class="form-floating">
                    <input type="text" 
                    name="account"
                    class="form-control input-top" id="floatingInput" placeholder="your account">
                    <label for="floatingInput">Account</label>
                </div>
                <div class="form-floating">
                    <input type="password" 
                    name="password"
                    class="form-control input-bottom" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating">
                    <input type="password" 
                    name="storeid"
                    class="form-control input-bottom" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">storeid</label>
                </div>
                <div class="mt-3 mb-2 d-flex">
                    <?php if(isset($_SESSION["error"])): ?>
                        <div class="text-danger"><?=$_SESSION["error"]["message"]?></div>
                    <?php endif; ?>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Sign in</button>
                </div>
                <div class="pt-4 text-center text-muted">
                    © 2017–2022
                </div>
            </form>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>
<?php
$servername = "localhost";
$username = "admin";
$password = "1234";
$dbname = "team3_project";

$conn = new mysqli($servername, $username, $password , $dbname);
//檢查連線

// php裡面 ->代表是conn物件的其中一個方法或資訊connect_error
if ($conn->connect_error) {
    die("連線失敗:".$conn->connect_error);
}else {
    // echo "連線成功";
}
$sql = "SELECT id, name FROM production_class";
$result = $conn -> query($sql);
?>
<!doctype html>
<html lang="en">

<head>
    <title>商品搜尋-依上架日</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../template/css/custom-bs.css">
    <link rel="stylesheet" href="../template/css/style.css">
    <style>
        * {
            -webkit-user-drag: none;
            font-family: 'Noto Sans TC', sans-serif;
            color: #222934;

        }

        .filterBtn {
            color: #222934;
            background-color: #FFC845;
        }

        .filterBtn:hover {
            color: #222934;
            background-color: #FFC845;
        }

        .filterBtn:active {
            color: #222934;
            background-color: #FFC845;
        }

        .filterBtn:visited {
            color: #222934;
            background-color: #FFC845;
        }

        .filterBtn:focus {
            color: #222934;
            background-color: #FFC845;
        }

        .detailBtn {
            color: #222934;
            background-color: #D5EEEE;
        }

        .detailBtn:hover {
            color: #fff;
            background-color: #49586f;
        }

        .detailBtn:active {
            color: #fff;
            background-color: #49586f;
        }

        .detailBtn:visited {
            color: #fff;
            background-color: #49586f;
        }

        .detailBtn:focus {
            color: #222934;
            background-color: #D5EEEE;
        }


        .catBtn {
            background-color: #D5EEEE;
            color: #222934;
            font-size: 1.25rem;
        }

        .catBtn:hover {
            color: #fff;
            background-color: #49586f;
        }

        .keywordBar,
        .priceBar {
            height: 48px;
        }

        .countBox {
            line-height: 37px;
            height: 37px;
            font-size: 16px;

        }

        .orderBtn {
            border: 2px solid #49586f;
            color: #222934;
            padding: 5px;
            margin-left: 3px;
            border-radius: 3px;
            text-align: center;
        }

        .orderBtn:hover {
            color: #fff;
            background-color: #49586f;
        }

        .pageBtn {
            padding: 10px;
            border: 2px solid #49586f;
            border-radius: 5px;
            color: #222934;
        }

        .pageBtn:active {
            color: #fff;
            background-color: #49586f;
        }

        .pageBtn:hover {
            color: #fff;
            background-color: #49586f;
        }

        .dateF {
            font-size: 0.8rem;
        }

        .dateS {
            height: 30px;
        }
    </style>
</head>

<body>

    <form name= "" class="form-control">

        <select name="">
            <option selected>請選擇</option>
            <?

            while ($row = $result->fetch_all(MYSQLI_ASSOC)) {
            ?>
                <option value='<?= $row["id"]; ?>'><?= $row["name"]; ?></option>
            <?
            }
            ?>
        </select>
    </form>
</body>

</html>
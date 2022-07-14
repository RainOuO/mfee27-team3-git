<?php
session_start();
require("./db-connect.php");


// GET 資料處理
$store_id = 6;

// SESSION 資料處理
$user_id = 12;

// 抓取 letter資料表內容，且只有 user_id AND $store_id資料
$sql = "SELECT * FROM letter where user_id = '$user_id' AND (store_id = '$store_id' OR store_id IS NULL)";
$result = $conn->query($sql);
$letterCount = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);

// 抓取 users資料表內容，為了抓取 user_id對應名稱
$sqlUserName = "SELECT id,name FROM users WHERE id = '$user_id' ";
$resultUserName = $conn -> query($sqlUserName);
$rowsUserName = $resultUserName -> fetch_assoc();

// 抓取 store_info資料表內容，為了抓取 store_id對應名稱、圖片
$sqlStoreName = "SELECT id, name, photo FROM store_info WHERE id = '$store_id'";
$resultStoreName = $conn -> query($sqlStoreName);
$rowsStoreName = $resultStoreName -> fetch_assoc();

?>
!<!doctype html>
<html lang="en">
  <head>
    <title>回覆店家</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="./letter-reply/style.css"> -->
    <link rel="stylesheet" href="./template/css/style.css">
    <link rel="stylesheet" href="./letter-reply/style.css">

  </head>
  <body style="overflow-x: hidden;">
  <main id="main" class="content-main overflow-auto flex-shrink-1 h-100 w-100">
                        <div class="main-content p-4 position-relative w-100">
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                <h1>回覆</h1>
                            </div>
                            <?php foreach ($rows as $row) : ?>
                                <div class="card mb-3" style="max-width: auto;">
                                    <div class="row g-0">
                                        <div class="col-md-1 d-flex justify-content-center align-items-center object-cover" style="height:30px;">
                                        </div>
                                        <div class="col-md-1">
                                            <?php if($row['reply_status'] == 1){echo $rowsUserName['name'];}else{echo $rowsStoreName['name'];} echo "<br>" . $row['time']; ?>
                                        </div>
                                        <div class="col-md-auto">
                                            <div class="card-body">
                                                <p class="card-text"><?= $row['content'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </main>
                    <div class="bottom-area fixed-bottom w-100">
                        <hr>
                        <form action="UserDoReply.php" method="post">
                            <input name="user_id" type="hidden" value="<?= $user_id ?>">
                            <textarea class="form-control textarea" id="exampleFormControlTextarea1" rows="3" name="message" required placeholder="請輸入訊息" onkeydown="if(event.keyCode==32||event.keyCode==13){return false;}"></textarea>
                            <div class="error"></div>
                            <div class="row mt-2 g-2 justify-content-end">
                                <div class="col-2">
                                    <button class="btn btn-info text-white" type="submit">送出</button>
                                </div>
                            </div>
                        </form>
                    </div>
    <script>
        // scroll Bar 永遠保持在最底部
        var chatHistory = document.querySelector("body");
        chatHistory.scrollTop = chatHistory.scrollHeight;
    </script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>
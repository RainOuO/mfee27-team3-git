<?php
    require("./db-connect.php");
    session_start();

    // GET 資料處理
    $user_id = $_GET['user_id'];

    // 資料庫語法
    // SELECT letter 資料表，user_id = GET到的$user_id
    $sql = "SELECT * FROM letter where user_id = '$user_id'";
    $result = $conn -> query($sql);
    $letterCount = $result -> num_rows;
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    // SELECT users 資料表 id,name
    // $sqlUserName = "SELECT id, name FROM users";
    // $resultUserName = $conn -> query($sqlUserName);
    // $countUserName = $resultUserName -> num_rows;
    // $rowsUserName = $resultUserName -> fetch_all(MYSQLI_ASSOC);

    for($i=0; $i<count($rows); $i++){
        // $rows[$i]['user_name'] = "TEST";
        $sqlUserName = "SELECT id, name FROM users WHERE user_id =?";
        $stmtUserName = $mysqli -> prepare($sqlUserName);



    }

?>

<!doctype html>
<html lang="en">
    <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    </head>
        <body>
            <div class="container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>user_id</th>
                            <th>user_name</th>
                            <th>store_id</th>
                            <th>store_name</th>
                            <th>reply_status</th>
                            <th>content</th>
                            <th>time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($rows as $letter): ?>
                            <tr>
                                <td><?=$letter['id']?></td>
                                <td><?=$letter['user_id']?></td>
                                <td><?=$letter['user_name']?></td>
                                <td><?=$letter['store_id']?></td>
                                <td></td>
                                <td><?=$letter['reply_status']?></td>
                                <td><?=$letter['content']?></td>
                                <td><?=$letter['time']?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </body>
</html>
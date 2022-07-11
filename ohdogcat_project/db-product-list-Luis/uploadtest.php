<?php
// require("../db-connect.php");

// $sql = "SELECT main_photo FROM product WHERE valid=1 ";
// $result = $conn->query($sql);

?>
<!doctype html>
<html lang="en">

<head>
    <title>File Upload</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .object-cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="doAddMainphoto.php" method="post" enctype="multipart/form-data">
            <!-- <div class="mb-3">
                <label for="">名稱</label>
                <input type="text" class="form-control" name="name">
            </div> -->
            <div class="mb-3">
                <input class="form-control" type="file" name="main_photo">
            </div>
            <button class="btn btn-info" type="submit">送出</button>
        </form>
        </div>
    </div>
</body>

</html>
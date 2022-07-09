<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php




    ?>
    <form class="photoinputALL" action="doUpdatephoto.php" method="post"
     enctype="multipart/form-data"> <!-- 判斷你的檔案路徑 -->
        <div class="mb-2">
            <input class="form-control inputphoto mx-3" type="file" name="myFile">
        </div>
        <button class="btnphoto mx-2" type="submit">照片儲存</button>
    </form>
</body>

</html>
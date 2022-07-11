<?
require('connection.php');
$file = $_FILES['myfile'];  //得到傳輸的資料,以陣列的形式
$name = $file['name'];      //得到檔名稱，以陣列的形式
$upload_path = "./upload_sub_photo"; //上傳檔案的存放路徑
//當前位置
foreach ($name as $k => $names) {
    $type = strtolower(substr($names, strrpos($names, '.') + 1)); //得到檔案型別，並且都轉化成小寫
    $allow_type = array('jpg', 'jpeg', 'gif', 'png'); //定義允許上傳的型別
    //把非法格式的圖片去除
    if (!in_array($type, $allow_type)) {
        unset($name[$k]);
    }
}
$str = '';
foreach ($name as $k => $item) {
    $type = strtolower(substr($item, strrpos($item, '.') + 1)); //得到檔案型別，並且都轉化成小寫
    if (move_uploaded_file($file['tmp_name'][$k], $upload_path . time() . $name[$k])) {
        //$str .= ','.$upload_path.time().$name[$k];
        echo 'success';
    } else {
        echo 'failed';
    }
}
//向指定id插入圖片地址（雖然是插入，但是是更新欄位，不要迷糊了）
$uid = 1;
$str = substr($str, 1);
$sql = "UPDATE upload set pic = '" . $str . "' WHERE id = " . $uid;
$result = $mysqli->query($sql);

?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        form {
            margin: 20px;
            padding: 10px;
        }

        #picInput>input {
            display: block;
            margin: 10px;
        }
    </style>
</head>

<body>
    <form action="上傳多個照片.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
        <div id="picInput">
            上傳圖片：<input type="file" name='myfile[]'>
        </div>
        <input id="addBtn" type="button" οnclick="addPic1()" value="繼續新增圖片"><br /><br />
        <input type="submit" value="上傳檔案">
    </form>
    <script>
        function addPic1() {
            var addBtn = document.getElementById('addBtn');
            var input = document.createElement("input");
            input.type = 'file';
            input.name = 'myfile[]';
            var picInut = document.getElementById('picInput');
            picInut.appendChild(input);
            if (picInut.children.length == 3) {
                addBtn.disabled = 'disabled';
            }
        }
    </script>
</body>

</html>
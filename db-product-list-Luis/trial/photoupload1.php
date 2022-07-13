<!doctype html>
<html lang="en">

<head>
    <title>圖片上傳預覽</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">
        <form method="post" action="image_proc.php">
            <input type="hidden" name="imagestring">
            <input class="form-control" accept="image/*" id="previewImage" type="file">
            <button class="btn btn-info mt-3" type="submit" name="submit" id="submit">上傳</button>
            <br />
            <img id="show_image" src="">
        </form>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        var imageProc = function(input) {
            if (input.files && input.files[0]) {
                // 建立一個 FileReader 物件
                var reader = new FileReader();

                // 當檔案讀取完後，所要進行的動作
                reader.onload = function(e) {
                    // 顯示圖片
                    $('#show_image').attr("src", e.target.result).css("height", "500px").css("width", "500px");
                    // 將 DataURL 放到表單中
                    $("input[name='imagestring']").val(e.target.result);
                };
                reader.readAsDataURL(input.files[0]);

            }
        }


        $(document).ready(function() {
            // 綁定事件
            $("#previewImage").change(function() {
                imageProc(this);
            });

        });
    </script>
</body>

</html>
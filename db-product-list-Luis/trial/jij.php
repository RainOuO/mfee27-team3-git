<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- 純 JavaScript 版本-->

    <!-- HTML part -->

    <form action="/somewhere/to/upload" enctype="multipart/form-data">

        <input type="file" onchange="readURL(this)" targetID="preview_progressbarTW_img" accept="image/gif, image/jpeg, image/png" />

        <img id="preview_progressbarTW_img" src="#" />

    </form>

    <!-- JavaScript part -->

    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {

                var imageTagID = input.getAttribute("targetID");

                var reader = new FileReader();

                reader.onload = function(e) {

                    var img = document.getElementById(imageTagID);

                    img.setAttribute("src", e.target.result)

                }

                reader.readAsDataURL(input.files[0]);

            }

        }
    </script>
</body>

</html>
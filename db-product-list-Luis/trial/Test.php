<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="/somewhere/to/upload" enctype="multipart/form-data">
        <input name="progressbarTW_img" type="file" id="imgInp" accept="image/gif, image/jpeg, image/png" />
        <img id="preview_progressbarTW_img" src="#" />
    </form>



    <form runat="server">
        <input accept="image/*" type='file' id="imgInp" />
        <img id="blah" src="#" alt="your image" />
    </form>
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>

</body>

</html>
<?php
$pattern = "/A-Z0-9{8}/ ";
// $matchCoutent 暫存的地方
// $content 下面質佳再一起
if (preg_match("/A-Z0-9{8}/", $content, $matchCoutent)) {
  echo "此序號可以使用";
} else {
  echo "此序號不可使用QQQ";
}
echo "<br>";
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

</head>

<body>


  <label for="">
    <input type="text code" value="" required="required">
    <button class="verify" id="btn" value="1">送出</button>
  </label>
  <script>
    let btn = document.querySelector("#btn");
    btn.addEventListener("click", function() {
      console.log("clickkkkkkkk");
      let a = <?= $pattern ?>;
      console.log(a);
      acontent = btn.vaule;
      console.log(acontent);
      if (preg_match("/A-Z0-9{8}/", $content, $matchCoutent)) {
        console.log("可以適用");
      } else {
        console.log("不能使用");
      }
      // avalue=a;
    });
    $content = btn.vaule;
  </script>
</body>

</html>
<?php 
require("db-connect.php");

$name=$_POST["name"]; //商品名稱
// $product_type=$_POST["product_type"]; //商品分類
$description=$_POST["description"];  //商品介紹
$price=$_POST["price"]; //商品價錢
// $spec=$_POST["spec"]; //商品規格
$valid_time_start=$_POST["valid_time_start"]; //商品上架期限
$valid_time_end=$_POST["valid_time_end"]; //商品下架期限
$stock_quantity=$_POST["stock_quantity"] ; //庫存數量

/////////////判斷商家照片
if($_FILES["myFile"]["error"]==0){
    if(move_uploaded_file($_FILES["myFile"]["tmp_name"], "../images/dashboard/".$_FILES["myFile"]["name"])){
        $fileName=$_FILES["myFile"]["name"];
/////////////判斷商品圖片
        if($_FILES["photoFile"]["error"]==0){
            if(move_uploaded_file($_FILES["photoFile"]["tmp_name"], "../images/dashboard/".$_FILES["photoFile"]["name"])){
                $fileNamephoto=$_FILES["photoFile"]["name"];
$sqlaa="INSERT INTO product 
(name , description ,price,valid_time_start,valid_time_end,stock_quantity,main_photo,sub_photo) 
VALUES ('$name' ,'$description' ,'$price','$valid_time_start','$valid_time_end','$stock_quantity','$fileName'
,'$fileNamephoto')";

if ($conn->query($sqlaa) === TRUE) {
    // echo "新資料圖片成功";
    // echo"<br>";
    header("location: BBproduct-edit-new-swiper.php.php");

}}}}};

    $sqlaas="INSERT INTO product 
(name , description ,price,valid_time_start,valid_time_end,stock_quantity) 
VALUES ('$name' ,'$description' ,'$price','$valid_time_start','$valid_time_end','$stock_quantity')";

if ($conn->query($sqlaas) === TRUE) {
    // echo "新資料成功";
    // echo"<br>";}
    header("location: BBproduct-edit-new-swiper.php.php");
}








// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();


// $sql="INSERT INTO product (name,)VALUES
//  ('$name',

// )";

// if ($conn->query($sql) === TRUE) {
//     echo "資料新增成功! ";
    
//     // session_start();
//     // $_SESSION["id"] = $id;

//     if (isset($_SESSION["id"])) {
//         // $_SESSION['update'] = 'success';
//         // header("location: user1.php");
        
//     }
// } else {
//     echo "建立資料表錯誤: " . $conn->error;
// };


////////////////////////////////////////////更新圖片地方

// session_start();

// require("db-connect.php");
// $id = $_SESSION["user"]['id'];
// // var_dump($id);

// if ($_FILES["MainFile"]["error"] == 0) {  
//     if (move_uploaded_file($_FILES["MainFile"]["tmp_name"],"../images/dashboard/".$_FILES["MainFile"]["name"]))  { 
//         $fileName = $_FILES["MainFile"]["name"]; //第一個myFile值是input 裡面的name 後面name是規定語法 取得他檔案名稱
//         $sql = "UPDATE  product  SET  main_photo='$fileName'  WHERE id='$id'";
//         if ($conn->query($sql) === TRUE) {
//                 // $_SESSION['updates'] = 'successs';
//                 echo "圖片更新成功";
//                 // header("location:bbbbbbbproduct-edit-new-swiper.php");
//         } else {
//             echo "Error: " . $sql . "<br>" . $conn->error;
//         }
//     } else {
//         echo "upload fail!!";
        
//     }
// }
/////////////////////////新增圖片


// if($_FILES["myFile"]["error"]==0){
//     if(move_uploaded_file($_FILES["myFile"]["tmp_name"], "../images/dashboard/".$_FILES["myFile"]["name"])){
//         $fileName=$_FILES["myFile"]["name"];
//         $sqla="INSERT INTO product (main_photo) VALUES ('$fileName')";
//         if ($conn->query($sqla) === TRUE) {
//             echo "新圖片成功";
//         } else {
//             echo "Error: " . $sql . "<br>" . $conn->error;
//         }
//     }}
?>
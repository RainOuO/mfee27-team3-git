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
// $mystring="1,2,3,4,5,6,7,8,9";
// $test=explode(",",$mystring);
// // print_r($test[2]);

// foreach($test as $aaa){
//     // $aaa=0 ; $aaa<0 ;
//     echo $aaa;
// }


$mystring="1,2,3,4,5,6,7,8,9";
$test=explode(",",$mystring);
print_r($test) ;

$testCount =count($test);
print_r($testCount);
for($i= 0 ;$i <= $testCount -1 ;$i++){
    echo $test[$i];
}



 if ($rowss[0]["main_photo"] == '') : ?> 
    <img class="object-cover"src="./user.jpg" alt="">
<?php else : ?>
<?php  
$rowphoto=explode(",",$rowss[0]["main_photo"]); //explode去除逗號
foreach($rowphoto as $rowaa){
    echo "<div class='swiper-slide photo1'><img src='../images/dashboard/$rowaa'/></div>";
    }?>
<?php endif;

// print_r(explode(",",$store_right));
// $asd=explode(",",$store_right);
// var_dump($asd);


// $str = 'K41变压器';
// preg_match('/\w+/',$str,$matchs);
// $str_r = str_replace($matchs[0],$matchs[0].' ',$str);
// echo $str_r;

?>
</body>
</html>
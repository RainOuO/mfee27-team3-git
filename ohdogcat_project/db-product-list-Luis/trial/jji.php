<?php
$Arr = "1,2,Banana,Grapes,Pineapple";
$test = explode(",", $Arr);
$testCount = count($test);
// $test[0];
// $test[1];
// $test[2];
// $test[0];
// $test[0];

// print_r($test);
// print_r($testCount);
// print_r($test[2]);

for ($i = 0; $i <= $testCount - 1; $i++) {
    echo $test[$i] . ".jpg";
}

?>

    <h1>照片</h1>
    <?php for ($i = 0; $i <= $testCount - 1; $i++) : ?>
        照片
        <?= $test[$i] . ".jpg" ?>
        <br>
    <? endfor; ?>

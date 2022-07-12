<?php
$row = ['A',"b", 'c'];
$newArr = ['','d',''];
$finalArr = [];
for($i=0; $i<count($newArr); $i++){
    if($newArr[$i] == ''){
        array_push($finalArr, $row[$i]);  
    }else{
        array_push($finalArr, $newArr[$i]);  
    }
}
$sql_text ='';
foreach( $finalArr as $i ){
    $sql_text .= $i.",";
}
var_dump($sql_text);
?>
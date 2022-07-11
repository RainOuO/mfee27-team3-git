<?php
session_start();
$action = $_POST['action'];
$id = $_POST['id'];
$storeRight = $_POST['store_right'];
if($action == 'update' && ($storeRight == 1 || $storeRight == 2 ||$storeRight == 3 ||$storeRight == 4 )){
    require("../db-connect.php");
    $sql="UPDATE store_info SET store_right = $storeRight WHERE id = $id";
    if($conn->query($sql) === TRUE){
        $_SESSION["user"]["store_right"] = $storeRight;
        $sqlType="SELECT type_name FROM p_type WHERE id = $storeRight";
        $resultType = $conn->query($sqlType);
        $row = $resultType->fetch_assoc();

        $data = [
            "success" => true,
            "data" => [
                
                "store_right" => $row['type_name']
            ]
        ];
    }else{
        $data = [
            "success" => false,
            "message" => "Error: " . $sql . "<br>" . $conn->error
        ];
    }
}else{
    $data = [
        "success" => false,
        "message" => "你還沒選就送出想騙？"
    ];
}
echo json_encode($data);

?>
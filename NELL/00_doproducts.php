<?php

$page =isset($_GET["page"])?  $page = $_GET["page"]: 1;
$type = isset($_GET["type"]) && !empty($_GET["type"]) ? $_GET["type"] : "";


require("../db-connect.php");

//側欄
$sqlCate =  "SELECT * FROM p_type ";
$resultCate = $conn->query($sqlCate);
$rowsCate = $resultCate->fetch_all(MYSQLI_ASSOC);
$rowsCate1 = $resultCate->num_rows;

//標題
$sqltitle =  "SELECT * FROM p_type WHERE id='$type'";
$resulttitle = $conn->query($sqltitle);
$rowstitle = $resulttitle->fetch_all(MYSQLI_ASSOC);



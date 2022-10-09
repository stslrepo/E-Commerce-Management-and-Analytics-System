<?php
$mysqli = new mysqli('localhost','root','','daiict');
if($mysqli->connect_errno != 0){
    echo $mysqli->connect_error;
    exit();
}
$sql = "SELECT * FROM amazon";
$result=$mysqli->query($sql);
while($product = $result->fetch_assoc()){
    $products[]=$product;
}

$encoded_data=json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
file_put_contents('data2.json',$encoded_data);
$sql = "SELECT * FROM flipkart";
$result=$mysqli->query($sql);
while($product = $result->fetch_assoc()){
    $products[]=$product;
}

$encoded_data=json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
file_put_contents('data2.json',$encoded_data);
$sql = "SELECT * FROM myntra";
$result=$mysqli->query($sql);
while($product = $result->fetch_assoc()){
    $products[]=$product;
}

$encoded_data=json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
file_put_contents('data2.json',$encoded_data);?>


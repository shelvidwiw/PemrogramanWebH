<?php
require_once('../config/connect_db.php');
header('Content-Type: application/json');

// Tangkap parameter dari URL
if (empty($_GET['name']) || empty($_GET['category']) || empty($_GET['price']) || empty($_GET['image'])) {
    echo json_encode(array(
        'RESPONSE' => 'INVALID INPUT',
        'ERROR' => 'Missing parameters',
        'RECEIVED' => $_GET
    ));
    exit;
}

// Assign parameter dari URL
$name = $_GET['name'];
$category = $_GET['category'];
$price = $_GET['price'];
$image = $_GET['image'];

// Siapkan query untuk insert
$sql = $conn->prepare("INSERT INTO products (name, category, price, image) VALUES (?, ?, ?, ?)");
$sql->bind_param('ssds', $name, $category, $price, $image);

// Eksekusi query dan tangani respons
if ($sql->execute()) {
    echo json_encode(array(
        'RESPONSE' => 'SUCCESS',
        'MESSAGE' => 'Product has been created',
        'PRODUCT_ID' => $conn->insert_id
    ));
} else {
    echo json_encode(array(
        'RESPONSE' => 'FAILED',
        'ERROR' => $conn->error
    ));
}
?>

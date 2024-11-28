<?php
require_once('../config/connect_db.php');
header('Content-Type: application/json');

// Tangkap input dari POST
$data = json_decode(file_get_contents("php://input"), true);
if (!$data) {
    $data = $_POST; // Jika bukan JSON, gunakan $_POST
}


// Periksa parameter
if (empty($data['id']) || empty($data['name']) || empty($data['category']) || empty($data['price']) || empty($data['image'])) {
    echo json_encode(array('RESPONSE' => 'INVALID INPUT', 'ERROR' => 'Missing parameters', 'RECEIVED' => $data));
    exit;
}

// Assign parameter
$id = $data['id'];
$name = $data['name'];
$category = $data['category'];
$price = $data['price'];
$image = $data['image'];

// Siapkan query untuk update
$sql = $conn->prepare("UPDATE products SET name = ?, category = ?, price = ?, image = ? WHERE id = ?");
$sql->bind_param('ssdsi', $name, $category, $price, $image, $id);

// Eksekusi query dan tangani respons
if ($sql->execute()) {
    if ($sql->affected_rows > 0) {
        echo json_encode(array('RESPONSE' => 'SUCCESS'));
    } else {
        echo json_encode(array('RESPONSE' => 'NO CHANGES', 'ERROR' => 'No rows affected'));
    }
} else {
    echo json_encode(array('RESPONSE' => 'FAILED', 'ERROR' => $conn->error));
}
?>

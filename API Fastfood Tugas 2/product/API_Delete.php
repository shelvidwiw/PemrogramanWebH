<?php
require_once('../config/connect_db.php');
header('Content-Type: application/json');

// Tangkap parameter dari URL
if (empty($_GET['id'])) {
    echo json_encode(array('RESPONSE' => 'INVALID INPUT', 'ERROR' => 'Missing parameter: id', 'RECEIVED' => $_GET));
    exit;
}

$id = $_GET['id'];

// Periksa apakah ID ada di database
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0) {
    echo json_encode(array('RESPONSE' => 'FAILED', 'ERROR' => 'ID not found'));
    exit;
}

// Siapkan query untuk delete
$sql = $conn->prepare("DELETE FROM products WHERE id = ?");
$sql->bind_param('i', $id);

// Eksekusi query dan tangani respons
if ($sql->execute()) {
    if ($sql->affected_rows > 0) {
        echo json_encode(array('RESPONSE' => 'SUCCESS', 'MESSAGE' => "Product with ID $id has been deleted."));
    } else {
        echo json_encode(array('RESPONSE' => 'FAILED', 'ERROR' => 'No rows affected'));
    }
} else {
    echo json_encode(array('RESPONSE' => 'FAILED', 'ERROR' => $conn->error));
}
?>

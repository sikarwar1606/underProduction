<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json'); // Ensure JSON response
include '../credentials/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $EmpId = $_POST['EmpId'] ?? null;
    $updates = $_POST['updates'] ?? null;

    if (!$EmpId || !$updates || !is_array($updates)) {
        echo json_encode(["success" => false, "error" => "Invalid input data."]);
        exit;
    }

    // Prepare the SET clause for the query
    $setParts = [];
    foreach ($updates as $field => $value) {
        // Ensure proper escaping of values
        $setParts[] = "`$field` = '" . $conn->real_escape_string($value) . "'";
    }

    $setQuery = implode(", ", $setParts);

    // Create the update query
    $sql = "UPDATE secure_user SET $setQuery WHERE EmpId = '" . $conn->real_escape_string($EmpId) . "'";

    if ($conn->query($sql)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }
    exit;
} else {
    echo json_encode(["success" => false, "error" => "Invalid request method."]);
    exit;
}
?>

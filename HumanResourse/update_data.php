<?php
include '../credentials/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $EmpId = $_POST['EmpId'];
    $updates = $_POST['updates'];

    // Prepare the SET clause for the query
    $setParts = [];
    foreach ($updates as $field => $value) {
        // Ensure proper escaping of values
        $setParts[] = "`$field` = '" . $conn->real_escape_string($value) . "'";
    }

    $setQuery = implode(", ", $setParts);

    // Create the update query
    $sql = "UPDATE secure_user SET $setQuery WHERE EmpId = '$EmpId'";

    if ($conn->query($sql)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }
}
?>

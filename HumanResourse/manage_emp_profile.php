<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('location: /HR/credentials/secure_login.php');
    exit;
}

include '../credentials/dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Manage Emp Profile</title>
    <link rel="stylesheet" href="manage_emp_profile.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      
    />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</head>
<body>

<!-- Including navbar -->
<?php include 'navbar_HR.php'; ?>

<!-- Responsive Menu -->
<?php include 'responsive_menu_HR.php'; ?>

<?php
$sql = "
SELECT 
    u.EmpId AS EmpId,
    u.user_name AS user_name,
    u.dob AS dob,
    u.phone AS phone,
    u.email AS email,
    c.UserId AS UserId,
    c.Passwordd AS Passwordd,
    s.status AS status
FROM secure_user u
LEFT JOIN 
    user_credentials c ON u.EmpId = c.EmpId
LEFT JOIN 
    emp_status s ON u.EmpId = s.EmpId
ORDER BY 
    u.EmpId;
";

$result = $conn->query($sql);

if (!$result) {
    die("Error executing query: " . $conn->error);
}

// Display data in an HTML table
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr>
        <th>Emp. id</th> 
        <th>Name</th> 
        <th>DOB</th> 
        <th>Number</th> 
        <th>Email id.</th>  
        <th>User Id</th> 
        <th>Password</th> 
        <th>Status</th> 
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td class='editable' data-field='user_name' data-id='{$row['EmpId']}'>{$row['EmpId']}</td>
            <td class='editable' data-field='user_name' data-id='{$row['user_name']}'>{$row['user_name']}</td>
            <td class='editable' data-field='user_name' data-id='{$row['dob']}'>{$row['dob']}</td>
            <td class='editable' data-field='user_name' data-id='{$row['phone']}'>{$row['phone']}</td>
            <td class='editable' data-field='user_name' data-id='{$row['email']}'>{$row['email']}</td>
            <td class='editable' data-field='user_name' data-id='{$row['UserId']}'>{$row['UserId']}</td>
            <td class='editable' data-field='user_name' >********</td> 
            <td class='editable' data-field='user_name' data-id='{$row['status']}'>{$row['status']}</td>
            <td class='edit-btn' data-id='{$row['EmpId']}'>Edit</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>

        

<script>
    // Attach event listener to edit buttons
    $(document).on("click", ".edit-btn", function() {
        let EmpId = $(this).data("id");
        let row = $(this).closest("tr");
        row.find(".editable").each(function() {
            let field = $(this).data("field");
            let value = $(this).text();
            $(this).html(`<input type="text" class="edit-input" data-field="${field}" data-id="${EmpId}" value="${value}" />`);
        });
        $(this).text("Save").addClass("save-btn").removeClass("edit-btn");
    });

    // Handle Save functionality
    $(document).on("click", ".save-btn", function() {
        let EmpId = $(this).data("id");
        let updates = {};

        // Collect edited values
        $(`input[data-id="${EmpId}"]`).each(function() {
            updates[$(this).data("field")] = $(this).val();
        });

        // Send data to server using AJAX
        $.ajax({
            url: "update_data.php",
            type: "POST",
            data: { EmpId: EmpId, updates: updates },
            success: function(response) {
                let res = JSON.parse(response);
                if (res.success) {
                    // Update table with new values
                    for (let field in updates) {
                        $(`td[data-field="${field}"][data-id="${EmpId}"]`).text(updates[field]);
                    }
                    $(`.save-btn[data-id="${EmpId}"]`).text("Edit").addClass("edit-btn").removeClass("save-btn");
                } else {
                    alert("Failed to update data!");
                }
            },
            error: function(xhr, status, error) {
                console.error("Error: " + error);
            }
        });
    });
</script>




</body>
</html>

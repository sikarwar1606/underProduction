<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('location: /HR/credentials/secure_login.php');
    exit;
}
// Database connection
include '..\credentials\dbconnect.php';
// End of database connection
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emp_id = $_POST['emp_id'];
    $month = $_POST['month'];

    $sql = "SELECT e.emp_id, e.name, e.designation, e.department, e.uan, s.* 
            FROM employees e 
            JOIN salary_details s ON e.emp_id = s.emp_id 
            WHERE e.emp_id = ? AND s.month = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $emp_id, $month);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(["error" => "No data found for the given Employee ID and Month."]);
    }

    $stmt->close();
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Salary Slip</title>
    <link rel="stylesheet" href="salary_slip.css">
</head>
<body>
    <!-- Including navbar -->
    <?php include 'navbar_HR.php'; ?>

    <!-- Responsive Menu -->
    <?php include 'responsive_menu_HR.php'; ?>

    <div class="salary-slip">
        <div class="header">
            <h1>COMPANY NAME</h1>
            <h2>COMPANY ADDRESS</h2>
            <h2>SALARY SLIP</h2>
        </div>

        <div class="details">
            <table>
                <tr>
                    <th>Employee ID</th>
                    <td><input type="text" id="emp_id" maxlength="6"></td>
                    <th>Month/Year</th>
                    <td><input type="text" id="month" maxlength="7" placeholder="MM/YYYY"></td>
                    <td><button id="fetch_btn">Fetch</button></td>
                </tr>
                <tr>
                    <th>Designation</th>
                    <td>incoming data..</td>
                    <th>Employee Name</th>
                    <td>incoming data..</td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td>incoming data..</td>
                    <th>UAN</th>
                    <td>incoming data..</td>
                </tr>
            </table>
        </div>

        <div class="earnings-deductions">
            <table>
                <thead>
                    <tr>
                        <th id="th_earning" colspan="2">Earning</th>
                        <th id="th_deductions" colspan="2">Deductions</th>
                        <th id="th_leave" colspan="2">Leave</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Basic:</td>
                        <td>Basic_data:</td>
                        <td>P.F:</td>
                        <td>P.F_data:</td>
                        <td>Days Paid:</td>
                        <td>Days Paid_data:</td>
                    </tr>
                    <tr>
                        <td>DA:</td>
                        <td>DA_data:</td>
                        <td>ESI:</td>
                        <td>ESI_data:</td>
                        <td>Days Present:</td>
                        <td>Days Present_data:</td>
                    </tr>
                    <tr>
                        <td>HRA:</td>
                        <td>HRA_data</td>
                        <td>LOAN</td>
                        <td>LOAN_data</td>
                        <td>W.Off/Paid Off:</td>
                        <td>W.Off/Paid Off_data:</td>
                    </tr>
                    <tr>
                        <td>TA:</td>
                        <td>TA:</td>
                        <td>TAX:</td>
                        <td>TAX:</td>
                        <td>LWP/Absent:</td>
                        <td>LWP/Absent:</td>
                    </tr>
                    <tr>
                        <td><strong>Total Addition:</strong></td>
                        <td><strong>Total Addition:</strong></td>
                        <td><strong>Total Deduction:</strong></td>
                        <td><strong>Total Deduction:</strong></td>
                        <td>PL:</td>
                        <td>PL:</td>
                    </tr>
                    <tr>
                        <td>?????</td>
                        <td>?????</td>
                        <td>?????</td>
                        <td>?????</td>
                        <td>CO+/CO-:</td>
                        <td>CO+/CO-:</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="summary">
            <table>
                <tr>
                    <th>Net Salary</th>
                    <td></td>
                </tr>
                <tr>
                    <th>Salary in Words</th>
                    <td></td>
                </tr>
                <tr>
                    <th>PL Balance</th>
                    <td></td>
                </tr>
                <tr>
                    <th>Balance CO</th>
                    <td></td>
                </tr>
            </table>
        </div>

        <div class="footer">
            <p>This is a computer-generated PaySlip</p>
        </div>        
    </div>
    <button id="print_btn">Print</button>

    <script>
        let print_btn = document.getElementById("print_btn");
        print_btn.addEventListener('click', function () {
            window.print();
        });

        // getting data from database
            document.getElementById('fetch_btn').addEventListener('click', function () {
            const empId = document.getElementById('emp_id').value;
            const month = document.getElementById('month').value;

            if (empId === '' || month === '') {
                alert('Please enter Employee ID and Month/Year.');
                return;
            }
        
            fetch('fetch_salary.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `emp_id=${empId}&month=${month}`,
            })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        populateSalarySlip(data);
                    }
                })
                .catch(error => console.error('Error:', error));
            });     

            function populateSalarySlip(data) {
            // Populate the salary slip with fetched data
            document.querySelector('.details td:nth-child(2)').innerText = data.emp_id;
            document.querySelector('.details td:nth-child(4)').innerText = data.name;

            // Populate earnings and deductions
            document.querySelector('.earnings-deductions tbody').innerHTML = `
                <tr><td>Basic:</td><td>${data.basic}</td></tr>
                <tr><td>DA:</td><td>${data.da}</td></tr>
                <tr><td>HRA:</td><td>${data.hra}</td></tr>
                <tr><td>TA:</td><td>${data.ta}</td></tr>
                <tr><td><strong>Total:</strong></td><td><strong>${data.basic + data.da + data.hra + data.ta}</strong></td></tr>
            `;
            }
    </script>
</body>
</html>

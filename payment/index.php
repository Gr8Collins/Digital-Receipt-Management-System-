<?php
include 'config.php';
// Handle form submission
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payer_name = mysqli_real_escape_string($conn, $_POST['payer_name']);
    $payment_date = $_POST['payment_date'];
    $total_amount = $_POST['total_amount'];
    $first_payment = $_POST['first_payment'] ?? 0;
    $second_payment = $_POST['second_payment'] ?? 0;
    $payment_id = 'GC-' . uniqid(); // Generate unique payment ID with prefix

    $sql = "INSERT INTO payments (payment_id, payer_name, payment_date, total_amount, first_payment, second_payment)
            VALUES ('$payment_id', '$payer_name', '$payment_date', '$total_amount', '$first_payment', '$second_payment')";

    if (mysqli_query($conn, $sql)) {
        // Redirect to print page after successful submission
        header("Location: print_receipt.php?id=$payment_id");
        exit();
    } else {
        $message = "❌ Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GREAT COLLINS TECHNOLOGIES - Payment Form</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Digital Receipt Management System </h2>
        <div class="info">
            <strong>GREAT COLLINS TECHNOLOGIES</strong><br>
            #50 EZZA ROAD, ABAKALIKI<br>
           Phone: 08130413479 |  Email: greatcollinstechnologies@gmail.com
        </div>

        <?php if (!empty($message)): ?>
            <div class="message <?php echo (strpos($message, 'successfully') !== false) ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form method="POST" onsubmit="return validateForm()" id="paymentForm">
            <label for="payer_name">Payer's Name</label>
            <input type="text" id="payer_name" name="payer_name" required placeholder="Enter Payer's name">
            <div id="name-error" class="error-message"></div>

            <label for="payment_date">Date of Payment</label>
            <input type="date" id="payment_date" name="payment_date" required>
            <div id="date-error" class="error-message"></div>

            <label for="total_amount">Total Amount to Pay (₦)</label>
            <input type="number" id="total_amount" name="total_amount" required placeholder="Enter Total amount">
            <div id="total-error" class="error-message"></div>

            <div class="amount-inputs">
                <div>
                    <label for="first_payment">First Payment (₦)</label>
                    <input type="number" id="first_payment" name="first_payment" step="0.01" value=" " placeholder="Enter amount">
                </div>
                <div>
                    <label for="second_payment">Second Payment (₦)</label>
                    <input type="number" id="second_payment" name="second_payment" step="0.01" value=" " placeholder="Enter amount">
                </div>
            </div>
            <div id="payment-error" class="error-message"></div>

            <button class="btn" type="submit">Submit Payment</button>
        </form>
    </div>
<script>
      document.addEventListener('DOMContentLoaded', function() {
            // Set today's date as default
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('payment_date').value = today;
            
            // Initialize event listeners
            document.getElementById("first_payment").addEventListener('input', validatePaymentAmounts);
            document.getElementById("second_payment").addEventListener('input', validatePaymentAmounts);
            document.getElementById("total_amount").addEventListener('input', validatePaymentAmounts);
        });

        function validatePaymentAmounts() {
            const total = parseFloat(document.getElementById("total_amount").value) || 0;
            const first = parseFloat(document.getElementById("first_payment").value) || 0;
            const second = parseFloat(document.getElementById("second_payment").value) || 0;
            
            if (first + second > total) {
                document.getElementById("payment-error").textContent = "Sum of partial payments cannot exceed total amount";
                return false;
            } else {
                document.getElementById("payment-error").textContent = "";
                return true;
            }
        }

        function validateForm() {
            // Clear previous error messages
            document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
            
            // Get form values
            const name = document.getElementById("payer_name").value.trim();
            const date = document.getElementById("payment_date").value;
            const total = parseFloat(document.getElementById("total_amount").value) || 0;
            
            let isValid = true;
            
            // Validate required fields
            if (!name) {
                document.getElementById("name-error").textContent = "Payer's name is required";
                isValid = false;
            }
            
            if (!date) {
                document.getElementById("date-error").textContent = "Payment date is required";
                isValid = false;
            }
            
            if (total <= 0) {
                document.getElementById("total-error").textContent = "Total amount must be greater than zero";
                isValid = false;
            }
            
            // Validate payment amounts
            if (!validatePaymentAmounts()) {
                isValid = false;
            }
            
            return isValid;
        }
</script>
</body>
</html>
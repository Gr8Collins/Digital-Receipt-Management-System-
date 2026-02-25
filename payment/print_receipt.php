<?php
include 'config.php';

// Get payment ID from URL
$payment_id = $_GET['id'] ?? '';

// Fetch payment details from database
$sql = "SELECT * FROM payments WHERE payment_id = '$payment_id'";
$result = mysqli_query($conn, $sql);
$payment = mysqli_fetch_assoc($result);

if (!$payment) {
    die("Payment record not found");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt - GREAT COLLINS TECHNOLOGIES</title>
    <style>
        :root {
            --primary-color: #007bff;
            --secondary-color: #6c757d;
            --success-color: #28a745;
            --dark-color: #343a40;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #fff;
            color: #333;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #eee;
        }
        
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 5px;
        }
        
        .address {
            font-size: 14px;
            margin-bottom: 5px;
        }
        
        .contact {
            font-size: 14px;
            color: var(--secondary-color);
        }
        
        .receipt-title {
            text-align: center;
            font-size: 22px;
            margin: 25px 0;
            color: var(--dark-color);
            text-decoration: underline;
            text-underline-offset: 8px;
        }
        
        .receipt-details {
            margin-bottom: 40px;
        }
        
        .receipt-details p {
            margin: 12px 0;
            font-size: 16px;
            display: flex;
        }
        
        .receipt-details p strong {
            min-width: 180px;
            display: inline-block;
        }
        
        .signature-section {
            margin-top: 100px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        
        .signature-box {
            width: 45%;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .signature-line {
            border-top: 1px solid #000;
            height: 1px;
            margin: 60px auto 10px;
            width: 80%;
        }
        
        .signature-label {
            font-weight: 600;
            margin-top: 5px;
        }
        
        .print-actions {
            text-align: center;
            margin-top: 40px;
        }
        
        .btn {
            background: var(--primary-color);
            color: #fff;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            margin: 0 10px;
            transition: background 0.3s;
        }
        
        .btn:hover {
            background: #0069d9;
        }
        
        .btn-secondary {
            background: var(--secondary-color);
        }
        
        .btn-secondary:hover {
            background: #5a6268;
        }
        
        @media print {
            .no-print {
                display: none;
            }
            
            body {
                padding: 0;
            }
            
            .signature-line {
                margin-top: 80px;
            }
        }
        
        @media (max-width: 576px) {
            .signature-box {
                width: 100%;
            }
            
            .receipt-details p {
                flex-direction: column;
            }
            
            .receipt-details p strong {
                min-width: auto;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">GREAT COLLINS TECHNOLOGIES</div>
        <div class="address">#50 EZZA ROAD, ABAKALIKI</div>
        <div class="contact"> 08130413479 | greatcollinstechnologies@gmail.com</div>
    </div>




    <div class="receipt-title">PAYMENT RECEIPT</div>

    <div class="receipt-details">
        <p>
            <strong>Receipt ID:</strong> 
            <span><?php echo htmlspecialchars($payment['payment_id']); ?></span>
        </p>
        <p>
            <strong>Date:</strong> 
            <span><?php echo htmlspecialchars($payment['payment_date']); ?></span>
        </p>
        <p>
            <strong>Payer's Name:</strong> 
            <span><?php echo htmlspecialchars($payment['payer_name']); ?></span>
        </p>
        <p>
            <strong>Total Amount  to Pay:</strong> 
            <span>₦<?php echo number_format($payment['total_amount'], 2); ?></span>
        </p>
        <?php if ($payment['first_payment'] > 0): ?>
            <p>
                <strong>First Payment:</strong> 
                <span>₦<?php echo number_format($payment['first_payment'], 2); ?></span>
            </p>
        <?php endif; ?>
        <?php if ($payment['second_payment'] > 0): ?>
            <p>
                <strong>Second Payment:</strong> 
                <span>₦<?php echo number_format($payment['second_payment'], 2); ?></span>
            </p>
        <?php endif; ?>
    </div>

    <div class="signature-section">
        <div class="signature-box">
            <div class="signature-line"></div>
            <div class="signature-label">Payer's Signature</div>
        </div>
        <div class="signature-box">
            <div class="signature-line"></div>
            <div class="signature-label">Receiver's Signature</div>
            <div style="margin-top: 10px;">(For GREAT COLLINS TECHNOLOGIES)</div>
        </div>
    </div>

    <div class="print-actions no-print">
        <button onclick="window.print()" class="btn">Print Receipt</button>
        <button onclick="window.location.href='index.php'" class="btn btn-secondary">New Payment</button>
    </div>

    <script>
        // Auto-print when page loads (optional)
        window.onload = function() {
            // Uncomment the next line to automatically open print dialog
            // window.print();
        };
    </script>
</body>
</html>
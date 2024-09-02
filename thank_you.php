<?php
session_start();
if (!isset($_SESSION["form_data"])) {
    header("Location: index.php");
    exit();
}

$form_data = $_SESSION["form_data"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .thank-you-box {
            background-color: white;
            padding: 40px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 800px; /* Tăng kích thước tối đa */
            width: 100%;
        }
        h1 {
            color: #4a90e2;
            margin-top: 0;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 30px;
            line-height: 1.5;
        }
        .info-grid {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 15px;
        }
        .info-label {
            font-weight: bold;
        }
        .info-value {
            color: #333;
        }
        .info-value a {
            color: #4a90e2;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="thank-you-box">
        <h1>Thank you for contacting us</h1>
        <p>We will be back in touch with you within one business day using the information you just provided below:</p>
        <div class="info-grid">
            <div class="info-label">Name:</div>
            <div class="info-value"><?php echo htmlspecialchars($form_data["name"]); ?></div>
            
            <div class="info-label">Phone:</div>
            <div class="info-value"><?php echo htmlspecialchars($form_data["phone"]); ?></div>
            
            <div class="info-label">Email Address:</div>
            <div class="info-value"><a href="mailto:<?php echo htmlspecialchars($form_data["email"]); ?>"><?php echo htmlspecialchars($form_data["email"]); ?></a></div>
            
            <div class="info-label">Company:</div>
            <div class="info-value"><?php echo htmlspecialchars($form_data["company"]); ?></div>
        </div>
    </div>
</body>
</html>
<?php
unset($_SESSION["form_data"]);
?>

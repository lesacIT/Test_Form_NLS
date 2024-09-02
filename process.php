<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["form_data"] = [
        "name" => $_POST["name"] ?? '',
        "email" => $_POST["email"] ?? '',
        "phone" => $_POST["phone"] ?? '',
        "company" => $_POST["company"] ?? '',
        "message" => $_POST["message"] ?? ''
    ];

    header("Location: thank_you.php");
    exit();
}
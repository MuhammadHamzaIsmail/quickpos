<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);
    $errors = [];

    if (empty($name)) $errors[] = "Name is required";
    if (empty($email)) $errors[] = "Email is required";
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email required";
    if (empty($message)) $errors[] = "Message is required";

    if (!empty($errors)) {
        echo "<h2>Errors:</h2><ul>";
        foreach($errors as $e) echo "<li>$e</li>";
        echo "</ul><a href='javascript:history.back()'>Go Back</a>";
        exit;
    }
    header("Location: thank-you.html");
    exit;
}
?>

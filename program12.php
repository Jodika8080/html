<?php
$errors = [];
$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$phone = $_POST["phone"] ?? "";
$password = $_POST["password"] ?? "";
$confirm = $_POST["confirm"] ?? "";
if (empty(trim($name)))
    $errors["name"] = "Name is required";
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    $errors["email"] = "Enter valid email";
if (!preg_match("/^[0-9]{10}$/", $phone))
    $errors["phone"] = "Enter 10 digits";
if (strlen($password) < 6)
    $errors["password"] = "Minimum 6 characters required";
if ($password != $confirm)
    $errors["confirm"] = "Password does not match";
if (empty($errors))
    $success = "Registration Successful!";
}
?>
<html>
<head>
<title>Registration Form</title>
</head>
<body bgcolor="pink">
<form method="POST">
<h2>Registration Form</h2>
<h3><?php echo $success; ?></h3>
Name:<br>
<input type="text" name="name">
<span><?php echo $errors["name"] ?? ""; ?></span>
<br><br>
Email:<br>
<input type="text" name="email">
<span><?php echo $errors["email"] ?? ""; ?></span>
<br><br>
Phone:<br>
<input type="text" name="phone" maxlength="10">
<span><?php echo $errors["phone"] ?? ""; ?></span>
<br><br>
Password:<br>
<input type="password" name="password">
<span><?php echo $errors["password"] ?? ""; ?></span>
<br><br>
Confirm Password:<br>
<input type="password" name="confirm">
<span><?php echo $errors["confirm"] ?? ""; ?></span>
<br><br>
<button type="submit">Register</button>
</form>
</body>
</html>

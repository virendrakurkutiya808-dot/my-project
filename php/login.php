<?php

session_start();

require_once "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare(
        "SELECT id, name, email, password FROM users WHERE email = ?"
    );

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_name"] = $user["name"];
            $_SESSION["user_email"] = $user["email"];

            header("Location: ../dashboard.php");
            exit();

        } else {
            echo "Wrong password. <a href='../login.html'>Try Again</a>";
        }

    } else {
        echo "User not found. <a href='../signup.html'>Create Account</a>";
    }

    $stmt->close();
}

$conn->close();

?>

<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}

$name = $_SESSION["user_name"];
$email = $_SESSION["user_email"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <nav>
        <h2>MyWebsite</h2>

        <div>
            <a href="dashboard.php">Home</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="hero">

        <h1>Welcome, <?php echo htmlspecialchars($name); ?>! 🎉</h1>

        <p>You have successfully logged in.</p>

        <div class="user-info">
            <p>
                <strong>Name:</strong>
                <?php echo htmlspecialchars($name); ?>
            </p>

            <p>
                <strong>Email:</strong>
                <?php echo htmlspecialchars($email); ?>
            </p>
        </div>

        <a href="logout.php" class="btn">Logout</a>

    </div>

</body>
</html>

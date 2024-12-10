<?php
include '../functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch existing users
    $users = readData('../data/users.json');

    // Check if username already exists
    foreach ($users as $user) {
        if ($user['username'] === $username) {
            $error = "Username already exists.";
            break;
        }
    }

    // Add new user
    if (!isset($error)) {
        $users[] = ['username' => $username, 'password' => hashPassword($password)];
        saveData('../data/users.json', $users);
        header('Location: signin.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <link href="../assets/css/styles.css" rel="stylesheet">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <div class="container">
        <h2>Sign Up</h2>
        <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>

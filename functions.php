<?php

/**
 * Reads data from a JSON file and returns it as an associative array.
 *
 * @param string $filePath Path to the JSON file.
 * @return array Parsed JSON data as an associative array.
 */
function readData($filePath) {
    if (!file_exists($filePath)) {
        return [];
    }
    $data = file_get_contents($filePath);
    return json_decode($data, true) ?? [];
}

/**
 * Saves data to a JSON file.
 *
 * @param string $filePath Path to the JSON file.
 * @param array $data Data to be saved.
 * @return void
 */
function saveData($filePath, $data) {
    file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
}

/**
 * Hashes a password using bcrypt.
 *
 * @param string $password Plaintext password.
 * @return string Hashed password.
 */
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

/**
 * Verifies a plaintext password against a hashed password.
 *
 * @param string $password Plaintext password.
 * @param string $hash Hashed password.
 * @return bool True if the password matches, false otherwise.
 */
function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}

/**
 * Checks if the user is authenticated (logged in).
 *
 * @return bool True if the user is authenticated, false otherwise.
 */
function isAuthenticated() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }    
    return isset($_SESSION['user']);
}

/**
 * Redirects the user to the login page if they are not authenticated.
 *
 * @return void
 */
function requireAuthentication() {
    if (!isAuthenticated()) {
        header('Location: ../auth/signin.php');
        exit;
    }
}

/**
 * Fetches a single blog post by its ID.
 *
 * @param int $id ID of the blog post.
 * @param array $posts Array of all blog posts.
 * @return array|null The blog post if found, null otherwise.
 */
function getPostById($id, $posts) {
    return $posts[$id] ?? null;
}
?>

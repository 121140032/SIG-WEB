<?php
session_start();
require __DIR__ . '/admin.php'; // Menggunakan jalur relatif absolut

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk memeriksa kredensial pengguna
    $sql = "SELECT * FROM admin WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Set session
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header("Location: ../client/berita.php");
            exit;
        } else {
            // Redirect with error message
            header("Location: ../client/login.html?error=Invalid email or password");
            exit;
        }
    } else {
        // Redirect with error message
        header("Location: ../client/login.html?error=Invalid email or password");
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>

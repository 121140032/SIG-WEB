<?php
require __DIR__ . '/admin.php'; // Menggunakan jalur relatif absolut

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $confirm_email = $_POST['confirm_email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi email dan password
    if ($email !== $confirm_email) {
        echo "Emails do not match";
    } elseif ($password !== $confirm_password) {
        echo "Passwords do not match";
    } else {
        // Cek apakah email sudah ada
        $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Email already exists";
        } else {
            // Hash password sebelum menyimpan
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Masukkan data pengguna baru ke tabel admin
            $stmt = $conn->prepare("INSERT INTO admin (nama_lengkap, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nama_lengkap, $email, $hashed_password);
            if ($stmt->execute() === TRUE) {
                header("Location: ../client/login.html");
                exit;
            } else {
                echo "Error: " . $stmt->error;
            }
        }

        $stmt->close();
    }

    $conn->close();
}
?>

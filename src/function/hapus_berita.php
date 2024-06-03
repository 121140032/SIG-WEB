<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sig_db";

// Membuat koneksi baru
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mendapatkan nilai dari form
$id = $_POST['beritaId'];

// Membuat dan mengeksekusi query SQL untuk menghapus data dari database
$sql = "DELETE FROM berita WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Berita berhasil dihapus";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>

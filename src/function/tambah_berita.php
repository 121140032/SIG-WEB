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
$link = $_POST['linkBerita'];
$judul = $_POST['judulBerita'];
$deskripsi = $_POST['deskripsiBerita'];
$foto = '';

// Memeriksa apakah file foto diunggah
if (isset($_FILES['fotoBerita']) && $_FILES['fotoBerita']['error'] === UPLOAD_ERR_OK) {
    $target_dir = "../assets/";
    $target_file = $target_dir . basename($_FILES["fotoBerita"]["name"]);

    // Memindahkan file foto ke folder yang ditentukan
    if (move_uploaded_file($_FILES["fotoBerita"]["tmp_name"], $target_file)) {
        $foto = $target_file;
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file foto.";
    }
}

// Membuat dan mengeksekusi query SQL untuk memasukkan data ke dalam database
$sql = "INSERT INTO berita (link, judul, deskripsi, foto) VALUES ('$link', '$judul', '$deskripsi', '$foto')";

if ($conn->query($sql) === TRUE) {
    echo "Berita berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>

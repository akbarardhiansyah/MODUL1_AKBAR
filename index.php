<?php
// Inisialisasi variabel untuk menyimpan nilai input dan error
$nama = $email = $nim = "";
$namaErr = $emailErr = $nimErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // **********************  1  **************************  
    // Tangkap nilai nama yang ada pada form HTML
    $nama = trim($_POST["nama"]);
    if (empty($nama)) {
        $namaErr = "Nama wajib diisi.";
    }

    // **********************  2  **************************  
    // Validasi format email agar sesuai dengan standar
    $email = trim($_POST["email"]);
    if (empty($email)) {
        $emailErr = "Email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Format email tidak valid.";
    }

    // **********************  3  **************************  
    // Pastikan NIM terisi dan angka
    $nim = trim($_POST["nim"]);
    if (empty($nim)) {
        $nimErr = "NIM wajib diisi.";
    } elseif (!ctype_digit($nim)) {
        $nimErr = "NIM harus berupa angka.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Mahasiswa Baru</title>
    <link rel="stylesheet" href="styles.css">  
</head>
<body>
    <div class="container">
        <img src="logo.png" alt="Logo" class="logo">
        <h2>Formulir Pendaftaran Mahasiswa Baru</h2>
        <form method="post" action="">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>">
            <span class="error"> <?php echo $namaErr; ?></span>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <span class="error"> <?php echo $emailErr; ?></span>

            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" value="<?php echo htmlspecialchars($nim); ?>">
            <span class="error"> <?php echo $nimErr; ?></span>

            <button type="submit">Daftar</button>
        </form>
    </div>
</body>
</html>

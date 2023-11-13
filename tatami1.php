<?php
session_start();
include "config.php";
// Cek apakah pengguna sudah login
if (isset($_SESSION['id'])) {
  if($_SESSION['status']==="admin_login"){
        header("location:admin.php");
        exit();
    }else if($_SESSION['status']==="tatami2_login"){
        header("location:tatami2.php");
        exit();
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penilaian Peserta</title>
</head>
<body>
    <?php
    
    // Cek apakah ada input urutan dari admin
    if (isset($_POST['urutan'])) {
        $urutan = $koneksi->real_escape_string($_POST['urutan']);

        // Query untuk mengambil data peserta dari database berdasarkan urutan
        $query = "SELECT * FROM daftar_peserta WHERE urutan = '$urutan'";
        $result = $koneksi->query($query);
        // var_dump($result);die;

        // Jika data peserta ditemukan, tampilkan form penilaian
        if ($result->num_rows > 0) {
            $peserta = $result->fetch_assoc();
    ?>
            <h2>Form Penilaian untuk Peserta <?= $peserta['nama']; ?></h2>
            <!-- Form penilaian disini -->
            <form method="post" action="proses_penilaian.php">
                <!-- Isi form penilaian -->
                <label for="score">Score:</label>
                <input type="number" name="score" id="score" required>
                <input type="hidden" name="urutan" value="<?= $urutan; ?>">
                <button type="submit">Submit</button>
            </form>
    <?php
        } else {
            echo "Peserta dengan urutan $urutan tidak ditemukan.";
        }
    } else {
        echo "Admin belum menginputkan urutan peserta.";
    }

    // Tutup koneksi
    $koneksi->close();
    ?>
    <script>
        // Setelah input score, lakukan refresh halaman
        document.addEventListener('submit', function () {
            location.reload();
        });
    </script>
</body>
</html>

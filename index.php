<?php
session_start();
include 'config.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Score Kumite</h1>
                <div id="datetime" class="text-center"></div>
            </div>
        </div>
        <div class="border rounded p-3">
          <?php
            // Query untuk mengambil data dari tabel
            $result = $koneksi->query("SELECT * FROM peserta");

            // Menampilkan card berulang
            while ($card = $result->fetch_assoc()) {
            ?>
                <div class="card mb-3">
                    <div class="row g-0">
                        <!-- <div class="col-md-4">
                            <img src="<?= $card['image'] ?>" alt="Gambar" class="img-fluid rounded-start">
                        </div> -->
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $card['nama'] ?></h5>
                                <p class="card-text">Score: <?= $card['score'] ?></p>
                                <p class="card-text">Kelas: <?= $card['kelas'] ?></p>
                                <p class="card-text">Kontingen: <?= $card['kontingen'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }

            // Tutup koneksi
            $koneksi->close();
            ?>
        </div>
        <p class="text-center" >Copyright © <?php echo date('Y') ?>. <b><a href="https://satriam.github.io" target=_blank>Satria Mulya</a></b></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        function updateDateTime() {
            var now = new Date();
            var dateTimeString = now.toLocaleString();
            document.getElementById('datetime').innerHTML = dateTimeString;

            // Update every second
            setTimeout(updateDateTime, 1000);
        }

        // Initial call
        updateDateTime();
    </script>
</body>
</html>

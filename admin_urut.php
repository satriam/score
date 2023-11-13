<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Urutan Peserta</title>
</head>
<body>
    <h2>Input Urutan Peserta</h2>
    
    <form method="post" action="tatami1.php">
       

        <label for="nama_peserta">Nama Peserta:</label>
        <input type="text" name="nama_peserta" required>
        <br>
        <label for="urutan">Urutan Peserta:</label>
        <input type="number" name="urutan" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

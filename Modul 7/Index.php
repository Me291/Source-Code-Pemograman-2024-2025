<?php
// Cek apakah form telah disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari input form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];
    $t=time();
    // Gabungkan data menjadi string
    $content = "Nama: $nama\nEmail: $email\nTelepon: $telepon\nAlamat: $alamat\n";

    // Nama file .txt baru
    $fileName = "data_namakalian" . date("Y-m-d",$t) . ".txt";
    $uploadFolder = __DIR__ . "/uploads/";

    // Membuat folder 'uploads' jika belum ada
    if (!is_dir($uploadFolder)) {
        mkdir($uploadFolder, 0777, true);
    }

    // Path untuk menyimpan file .txt
    $filePath = $uploadFolder . $fileName;

    // Menyimpan data ke file .txt
    if (file_put_contents($filePath, $content) !== false) {
        // Data berhasil disimpan
        echo "<script>
                setTimeout(function() {
                    Swal.fire({
                        title: 'Sukses!',
                        text: 'Data berhasil disimpan sebagai $fileName di folder uploads.',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                }, 100);
              </script>";
    } else {
        // Terjadi kesalahan saat menyimpan
        echo "<script>
                setTimeout(function() {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat menyimpan data ke file.',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                }, 100);
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data</title>
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Style form dan konten */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-top: 10px;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"],
        .redirect-button {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px; /* Add margin to the top */
        }
        input[type="submit"]:hover,
        .redirect-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Input Data</h2>
        <form action="" method="post">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="telepon">Telepon:</label>
            <input type="text" id="telepon" name="telepon" required>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" rows="4" required></textarea>

            <input type="submit" name="submit" value="Simpan sebagai TXT">
        </form>
        <!-- Button to redirect to Isi_File.php -->
        <button class="redirect-button" onclick="window.location.href='Isi_File.php';">Liat Isi File</button>
    </div>
</body>
</html>

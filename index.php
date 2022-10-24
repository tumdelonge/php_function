<?php
require 'function.php';

// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    if (simpanData($_POST) > 0) {
        echo "
        <script>
        alert('File Berhasil ditambahkan :)')
        </script>";
    } else {
        echo "
        <script>
        alert('File Gagal ditambahkan :(')
        </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto / Gambar</title>

    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .container {
            width: 80%;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <div class="form-tittle" style="margin-bottom: 10px;">
                <h2>Upload Foto / Gambar</h2>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="detail-box">
                    <label style="display: block; margin-bottom: 3px;" for="">Keterangan / nama Gambar</label>
                    <input type="text" name="keterangan" id="ketarangan" placeholder="keterangan / nama gambar">
                </div>
                <div class="detail-box">
                    <label style="display: block; margin-bottom: 3px;" for="">Foto / Gambar</label>
                    <input type="file" name="foto" id="foto">
                </div>
                <div class="detail-box">
                    <input type="submit" name="simpan" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
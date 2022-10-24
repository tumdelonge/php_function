<?php
$conn = mysqli_connect('localhost', 'root', '', 'file_gambar');

if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
}


// fungsi  simpan
function simpanData($data)
{
    global $conn;

    // ambil data dari form
    $keterangan = $data['keterangan'];

    // upload gambar
    $foto = upload();
    if (!$foto) {
        return false;
    }

    // query insert data ke database
    $query = mysqli_query($conn, "INSERT INTO images(keterangan, foto)VALUES('$keterangan', '$foto')");

    return mysqli_affected_rows($conn);
}

// fungsi upload
function upload()
{
    // ambil data gambar
    $fileName = $_FILES['foto']['name'];
    $fileSize = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // jika file gambar tidak dipilih
    if ($error == 4) {
        echo "
        <script>
        alert('anda belum memilih gambar/foto')
        </script>";
        return false;
    }

    // jika gambar lebih besar dari 2mb
    if ($fileSize > 2000000) {
        echo "
        <script>
        alert('file lebih dari 2 Mb')
        </script>";
        return false;
    }

    // jika file bukan gambar
    $ekstensiFileValid = ['jpg', 'jpeg', 'png'];
    $ekstensiFile = explode('.', $fileName);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "
        <script>
        alert('file yang anda pilih bukan gambar')
        </script>";
        return false;
    }

    // kondisi terpenuhi, upload & move file gambar
    // generate nama baru
    $fileNamaBaru = uniqid();
    $fileNamaBaru .= '.';
    $fileNamaBaru .= $ekstensiFile;
    move_uploaded_file($tmpName, 'img/' . $fileNamaBaru);

    return $fileNamaBaru;
}

<!DOCTYPE html>
<html lang="en">

<?php
include 'koneksi.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Input Data</title>
</head>

<body>
    <a href="index.php">Kembali</a>
    <center>
        <form action="model_mahasiswa.php" method="POST">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input name="nama" type="text"></td>
                </tr>

                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><input name="nim" type="text"></td>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><input name="asal" type="text"></td>
                </tr>

                <tr>
                    <td>Universitas</td>
                    <td>:</td>
                    <td><input name="univ" type="text"></td>
                </tr>
            </table>
            <input type="submit" value="SIMPAN">
        </form>
    </center>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tampil Data Mahasiswa</title>
</head>

<body>
    <?php
    include 'koneksi.php';
    $sql_select = "SELECT * FROM mahasiswa";
    $stmt = $conn->query($sql_select);
    $mahasiswa = $stmt->fetchAll();
    ?>

    <a href="index.php">Kembali</a>

    <center>
        <table>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>NIM</td>
                <td>Alamat</td>
                <td>Universitas</td>
            </tr>
            <?php foreach ($mahasiswa as $isi) { ?>
                <tr>
                    <td><?php $no; ?></td>
                    <td><?php $isi->nama; ?></td>
                    <td><?php $isi->nim; ?></td>
                    <td><?php $isi->alamat; ?></td>
                    <td><?php $isi->universitas; ?></td>
                </tr>
            <?php } ?>
        </table>
    </center>
</body>

</html>
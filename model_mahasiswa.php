<?php
    try {

        include 'koneksi.php';
        $id = mt_rand(1000, 9999);
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $asal = $_POST['asal'];
        $universitas = $_POST['univ'];

        $sql_insert = "INSERT INTO mahasiswa (id, nama, nim, asal, universitas) 
                                VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $nama);
        $stmt->bindValue(3, $nim);
        $stmt->bindValue(4, $asal);
        $stmt->bindValue(5, $universitas);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Failed: " . $e;
    }
?>
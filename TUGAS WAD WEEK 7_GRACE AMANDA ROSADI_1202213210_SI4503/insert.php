<?php

include 'connect.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['namapelanggan'];
    $paket = $_POST['paket'];
    $berat = $_POST['berat'];
    $tglmasuk = $_POST['tglmasuk'];
    $estselesai = "";
    $parfum =  $_POST['parfum'];
    $totalharga = 0;
    $status = $_POST['status'];

    if ($paket == "Reguler") {
        $estselesai = date('Y-m-d', strtotime('+3 days', strtotime($tglmasuk)));
        $totalharga = $berat * 5000;
    } else if ($paket == "Express") {
        $estselesai = date('Y-m-d', strtotime('+1 days', strtotime($tglmasuk)));
        $totalharga = $berat * 7000;
    } else if ($paket == "Kilat") {
        $estselesai = date('Y-m-d', strtotime('+6 hours', strtotime($tglmasuk)));
        $totalharga = $berat * 10000;
    }

    // var_dump($totalharga, $estselesai);

    $sql = "INSERT INTO laundry_order (nama_pelanggan, paket_laundry, berat, tgl_masuk, est_selesai, parfum, total_harga, status) VALUES ('$nama', '$paket', '$berat', '$tglmasuk', '$estselesai', '$parfum', '$totalharga', '$status')";
    $query = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        h1 {
            text-align: center;
        }
        .container2 {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .mb-3 {
            margin: 30px;
        }
    </style>
    <title>Input Order Laundry</title>
</head>
<body>
    <h1>Masukkan Order Laundry</h1>
    <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="col-6">
                    <label for="namapelanggan" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="namapelanggan" name="namapelanggan">
                </div>
                <div class="col-6">
                    <label for="paket" class="form-label">Paket Laundry</label>
                    <select class="form-select" aria-label="Default select example" id="paket" name="paket">
                        <option selected>--Pilih Paket Laundry--</option>
                        <option value="Reguler">Reguler</option>
                        <option value="Express">Express</option>
                        <option value="Kilat">Kilat</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="berat" class="form-label">Berat (Kg)</label>
                    <input type="number" class="form-control" id="berat" name="berat" step="0.01">
                </div>
                <div class="col-6">
                    <label for="tglmasuk" class="form-label">Tanggal Masuk</label>
                    <input type="date" class="form-control" id="tglmasuk" name="tglmasuk">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="parfum" class="form-label">Parfum</label>
                    <select class="form-select" aria-label="Default select example" id="parfum" name="parfum">
                        <option selected>--Pilih Parfum--</option>
                        <option value="Lavender">Exotic</option>
                        <option value="Lemon">Lemon</option>
                        <option value="Rose">Rose</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" aria-label="Default select example" id="status" name="status">
                        <option selected>--Pilih Status--</option>
                        <option value="Diproses">Diproses</option>
                        <option value="Dicuci">Dicuci</option>
                        <option value="Disetrika">Disetrika</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Sudah Dibayar">Sudah Dibayar</option>
                    </select>
                </div>
            </div>
            <div class="container">
                <div class="mb-3">
                    <input type="submit" class="form-control" value="submit" id="submit" name="submit">
                </div>
            </div>
        </form>
    </div>
    <div class="container">
        <?php if(isset($_POST['submit'])) : ?>
            <?php if( $query ) : ?>
                <div class="alert alert-success" role="alert">
                    Order laundry berhasil ditambahkan!
                </div>
            <?php else : ?>
                <div class="alert alert-danger" role="alert">
                    Order gagal ditambahkan!
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="container2">
        <a href="index.php" class="btn btn-primary">Lihat Order Laundry</a>
    </div>
</body>
</html>
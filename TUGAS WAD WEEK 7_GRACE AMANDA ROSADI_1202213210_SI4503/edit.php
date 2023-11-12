<?php

include'connect.php';

$id = $_GET["id"];
$order = mysqli_query($conn, "SELECT * from laundry_order WHERE order_id=$id");
$row = mysqli_fetch_assoc($order);

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

    $sql = "UPDATE laundry_order SET nama_pelanggan='$nama', paket_laundry='$paket', berat='$berat', tgl_masuk='$tglmasuk', est_selesai='$estselesai', parfum='$parfum', total_harga='$totalharga', status='$status' WHERE order_id=$id";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("Location: index.php");
    }
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
        .mb-3 {
            margin: 30px;
        }
    </style>
    <title>Edit Order Laundry</title>
</head>
<body>
    <h1>Masukkan Order Laundry</h1>
    <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="col-6">
                    <label for="namapelanggan" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="namapelanggan" name="namapelanggan" required value="<?= $row['nama_pelanggan'] ?>">
                </div>
                <div class="col-6">
                    <label for="paket" class="form-label">Paket Laundry</label>
                    <select class="form-select" aria-label="Default select example" id="paket" name="paket">
                        <option <?= ($row['paket_laundry'] === "Reguler") ? 'selected' : '' ?> value="Reguler">Reguler</option>
                        <option <?= ($row['paket_laundry'] === "Express") ? 'selected' : '' ?> value="Express">Express</option>
                        <option <?= ($row['paket_laundry'] === "Kilat") ? 'selected' : '' ?> value="Kilat">Kilat</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="berat" class="form-label">Berat (Kg)</label>
                    <input type="number" class="form-control" id="berat" name="berat" step="0.01" required value="<?= $row['berat'] ?>">
                </div>
                <div class="col-6">
                    <label for="tglmasuk" class="form-label">Tanggal Masuk</label>
                    <input type="date" class="form-control" id="tglmasuk" name="tglmasuk" required value="<?= $row['tgl_masuk'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="parfum" class="form-label">Parfum</label>
                    <select class="form-select" aria-label="Default select example" id="parfum" name="parfum">
                        <option <?= ($row['parfum'] === "Exotic") ? 'selected' : '' ?> value="Exotic">Exotic</option>
                        <option <?= ($row['parfum'] === "Lemon") ? 'selected' : '' ?> value="Lemon">Lemon</option>
                        <option <?= ($row['parfum'] === "Rose") ? 'selected' : '' ?> value="Rose">Rose</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" aria-label="Default select example" id="status" name="status">
                        <option <?= ($row['status'] === "Diproses") ? 'selected' : '' ?> value="Diproses">Diproses</option>
                        <option <?= ($row['status'] === "Dicuci") ? 'selected' : '' ?> value="Dicuci">Dicuci</option>
                        <option <?= ($row['status'] === "Disetrika") ? 'selected' : '' ?> value="Disetrika">Disetrika</option>
                        <option <?= ($row['status'] === "Selesai") ? 'selected' : '' ?> value="Selesai">Selesai</option>
                        <option <?= ($row['status'] === "Sudah Dibayar") ? 'selected' : '' ?> value="Sudah DIbayar">Sudah Dibayar</option>
                    </select>
                </div>
            </div>
            <div class="container">
                <div class="mb-3">
                    <input type="submit" class="form-control" value="submit" id="submit" name="submit" onclick="confirm('Apakah anda yakin ingin mengubah data order?')">
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<?php

include 'connect.php';

$order = mysqli_query($conn, "SELECT * FROM laundry_order");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Order Laundry</title>
</head>
<body>
    <div class="container">
        <h1>Order Laundry</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Paket Laundry</th>
                    <th scope="col">Berat</th>
                    <th scope="col">Tanggal Masuk</th>
                    <th scope="col">Estimasi Selesai</th>
                    <th scope="col">Parfum</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                while ($row = mysqli_fetch_assoc($order)) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row['nama_pelanggan']; ?></td>
                        <td><?= $row['paket_laundry']; ?></td>
                        <td><?= $row['berat']; ?></td>
                        <td><?= $row['tgl_masuk']; ?></td>
                        <td><?= $row['est_selesai']; ?></td>
                        <td><?= $row['parfum']; ?></td>
                        <td><?= $row['total_harga']; ?></td>
                        <td><?= $row['status']; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['order_id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $row['order_id']; ?>" class="btn btn-danger" onclick="confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="insert.php" class="btn btn-primary">Tambah Order</a>
    </div>
</body>
</html>

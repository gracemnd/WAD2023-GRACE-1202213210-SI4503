<?php

include 'connect.php';

$id = $_GET["id"];

$delete = mysqli_query($conn, "DELETE FROM laundry_order WHERE order_id=$id");

if ($delete) {
    header("Location: index.php");
}

<?php
// Koneksi ke Database
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'hasil_hill_cipher';
$conn = mysqli_connect("localhost", "root", "", "hasil_hill_cipher");

if (!$conn) {
  die("Koneksi ke database gagal: " . mysqli_connect_error());
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];

  $delete_query = "DELETE FROM hasil_hill_cipher WHERE id = ?";
  $stmt = mysqli_prepare($conn, $delete_query);
  mysqli_stmt_bind_param($stmt, "i", $id);

  if (mysqli_stmt_execute($stmt)) {

    header("Location: data.php?message=success");
  } else {
    header("Location: data.php?message=error");
  }

  mysqli_stmt_close($stmt);
} else {
  header("Location: data.php?message=error");
}

mysqli_close($conn);

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Hill Cipher</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <Style>
    body {
      background-image: url(bg.jpg);
    }
  </Style>
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h5 class="mb-3 text-center">Data Hill Cipher</h5>
        <?php
        if (isset($_GET['message'])) {
          if ($_GET['message'] == 'success') {
            echo '<div class="alert alert-danger">Berhasil menghapus data.</div>';
          } elseif ($_GET['message'] == 'error') {
            echo '<div class="alert alert-danger">Gagal menghapus data.</div>';
          }
        }
        ?>
        <table class="table table-hover table-bordered text-center">
          <thead class="table-secondary">
            <tr>
              <th>ID</th>
              <th>Plainteks</th>
              <th>Key</th>
              <th>Mode</th>
              <th>Hasil</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
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

            // Query untuk mengambil data dari database
            $query = "SELECT * FROM hasil_hill_cipher";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row['id'] . "</td>";
              echo "<td>" . $row['input_text'] . "</td>";
              echo "<td>" . $row['key'] . "</td>";
              echo "<td>" . $row['mode'] . "</td>";
              echo "<td>" . $row['result'] . "</td>";
              echo "<td><a href='delete.php?id=" . $row['id'] . "' class='btn btn-primary'>Hapus</a></td>"; // Tambah tombol Hapus dengan link ke delete.php
              echo "</tr>";
            }

            mysqli_close($conn);
            ?>
          </tbody>
        </table>
        <a class="link-underline link-underline-opacity-0" href="index.php" style="text-decoration: none; color: #FFFFFF; background-color: #252c36; padding: 5px; border: 1px solid #000000; border-radius: 5px; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#e00707'" onmouseout="this.style.backgroundColor='#252c36'">Menu</a>
      </div>
    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js" integrity="sha384-LxRHzFGwDA5CfAPQGKpao4QhjNJlnI9l6H5hCR0zOX0w8UbZJJ15EN1uIvt9n6Ed" crossorigin="anonymous"></script>
</body>

</html>
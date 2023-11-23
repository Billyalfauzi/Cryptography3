<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hasil Hill Cipher</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <Style>
    body {
      background-image: url(bg.jpg);
    }
    </style>
</head>

<body>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <?php
        require('functions.php');
        // Koneksi ke Database
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'hasil_hill_cipher';

        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

        if (!$conn) {
          die("Koneksi ke database gagal: " . mysqli_connect_error());
        }

        // Simpan Hasil ke Database
        $result = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $text = isset($_POST['text']) ? $_POST['text'] : '';
          $key00 = isset($_POST['key00']) ? intval($_POST['key00']) : null;
          $key01 = isset($_POST['key01']) ? intval($_POST['key01']) : null;
          $key10 = isset($_POST['key10']) ? intval($_POST['key10']) : null;
          $key11 = isset($_POST['key11']) ? intval($_POST['key11']) : null;
          $mode = isset($_POST['mode']) ? $_POST['mode'] : '';

          if (!is_null($key00) && !is_null($key01) && !is_null($key10) && !is_null($key11)) {
            $key_matrix = [
              [$key00, $key01],
              [$key10, $key11]
            ];

            try {
              $result = hill_cipher($text, $key_matrix, $mode);


              $sql = "INSERT INTO hasil_hill_cipher (input_text, `key`, mode, result) VALUES (?, ?, ?, ?)";
              $stmt = mysqli_prepare($conn, $sql);
              mysqli_stmt_bind_param($stmt, "ssss", $text, $key, $mode, $result);

              $text = $_POST['text'];
              $key = $key00 . ' ' . $key01 . ' ' . $key10 . ' ' . $key11;
              $mode = $_POST['mode'];
              $result = $result;

              if (mysqli_stmt_execute($stmt)) {
                echo "
                        <div class='alert alert-success'>Data berhasil disimpan di database</div>";
              } else {
                echo "<div class='alert alert-danger'>Data Gagal disimpan di database:</div> " . mysqli_error($conn);
              }

              mysqli_stmt_close($stmt);
            } catch (Exception $e) {
              $result = "Error: " . $e->getMessage();
            }
          } else {
            $result = "Error: Key elements are not set.";
          }
        }


        mysqli_close($conn);
        ?>
        <div class="card">
          <h6 class="card-header">Hasil Enkrip or Dekrip</h6>
          <div class="card-body">
            <p class="mb-2"><strong>Plainteks:</strong> <?php echo $text; ?></p>
            <p class="mb-2"><strong>Key:</strong> <?php echo $key00; ?> <?php echo $key01; ?> <?php echo $key10; ?> <?php echo $key11; ?></p>
            <p class="mb-2"><strong>Mode:</strong> <?php echo $mode; ?></p>
            <p class="mb-2"><strong>Hasil:</strong> <?php echo $result; ?></p>
            <a class="btn btn-primary link-underline link-underline-opacity-0" href="index.php" style="text-decoration: none; color: #FFFFFF; background-color: #252c36; padding: 5px; border: 1px solid #252c36; border-radius: 5px; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#e00707'" onmouseout="this.style.backgroundColor='#252c36'">Kembali</a>

          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js" integrity="sha384-LxRHzFGwDA5CfAPQGKpao4QhjNJlnI9l6H5hCR0zOX0w8UbZJJ15EN1uIvt9n6Ed" crossorigin="anonymous"></script>
</body>

</html>
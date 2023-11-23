# Kriptografi
# Hill Cipher
## Enkripsi-Dekripsi
<body>
    <table border="1">
        <tr>
            <th> Nama</th>
            <th>NIM</th>
            <th>Kelas</th>
        </tr>
        <tr>
            <td>Billy Alfauzi Caesar</td>
            <td>312110152</td>
            <td>TI.21.A.1</td>
        </tr>
    </table>
</body>

## Enkripsi

![Gambar 1](img/ss1.png)

Pengguna mengakses halaman index.php yang menampilkan formulir untuk memasukkan teks plainteks, matriks kunci (2x2), dan memilih mode enkripsi atau dekripsi (dengan mode diatur dalam radio button).

![Gambar 2](img/ss2.png)

- Setelah pengguna mengisi formulir dan mengirimkannya, data yang dimasukkan diambil dengan metode POST di halaman hill_cipher.php. Halaman hill_cipher.php menginisialisasi koneksi ke database MySQL.

- Informasi koneksi seperti nama host, nama pengguna, kata sandi, dan nama database didefinisikan di halaman ini.

## Dekripsi

![Gambar 3](img/ss3.png)

Mengonversi ciphertext kembali ke teks awal

![Gambar 4](img/ss4.png)

Proses Dekripsi Text berhasil

## Hasil Data
![Gambar 5](img/ss5.png)

Hasil enkripsi atau dekripsi bersama dengan text, kunci, dan mode disimpan ke dalam database MySQL menggunakan perintah SQL. Hasil ini akan digunakan untuk ditampilkan di halaman data.php dan dapat diakses kembali.

Hasil enkripsi atau dekripsi disimpan dalam variabel result.

## Done

# Panjang Umur Untuk Semua Hal-Hal Baik

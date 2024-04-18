<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Receiver - Privy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        pre {
            background-color: #eee;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
        }
        a {
            display: block;
            margin-bottom: 10px;
            padding: 10px;
            text-align: center;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #0056b3;
        }
        .download-btn {
            display: block;
            margin-top: 20px;
            padding: 10px;
            text-align: center;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .download-btn:hover {
            background-color: #218838;
        }
        .clear-btn {
            display: block;
            margin-top: 20px;
            padding: 10px;
            text-align: center;
            background-color: #577293;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .clear-btn {
            background-color: #527ba3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Data Receiver</h1>
        <a href="../index.php">Kembali</a>
        <?php

        // Ambil data dari permintaan POST
        $data = $_POST;

        // Buat string JSON dari data
        $json_data = json_encode($data, JSON_PRETTY_PRINT);

        // Nama file untuk menyimpan data
        $file = './received_data.txt';

        // Jika ada data yang diterima, tulis ke dalam file
        if (!empty($data)) {
            // Buka file untuk ditulis
            $file_handle = fopen($file, 'a');

            // Tulis data ke dalam file
            if ($file_handle) {
                fwrite($file_handle, $json_data . PHP_EOL); // Menambahkan baris baru setiap kali ada data baru
                fclose($file_handle);
                echo "<p>Data berhasil disimpan.</p>";
            } else {
                echo "<p>Gagal menyimpan data.</p>";
            }
        }

        // Tampilkan tombol unduh file sebelum menampilkan isi file
        echo '<a href="download.php" class="download-btn">Download received_data.txt</a>';
        echo '<a href="clear.php" class="clear-btn">Clear</a>';

        // Tampilkan isi file setelah data ditambahkan
        $file_content = file_get_contents($file);
        if (!empty($file_content)) {
            echo "<h2>Received Data:</h2>";
            echo "<pre>" . htmlspecialchars($file_content) . "</pre>";
        }
        ?>
    </div>
</body>
</html>

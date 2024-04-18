<?php
$file = './received_data.txt';

// Hapus konten file
file_put_contents($file, '');

echo "<p>Data berhasil dihapus.</p>";

// Redirect kembali ke halaman sebelumnya
header("Location: {$_SERVER['HTTP_REFERER']}");
?>

<?php
$file = './received_data.txt';

// Set header untuk menentukan tipe konten sebagai file teks
header('Content-Type: text/plain');
// Set header untuk memberitahu browser agar men-download file sebagai attachment
header('Content-Disposition: attachment; filename="received_data.txt"');
// Baca dan tampilkan isi file
readfile($file);

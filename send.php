<?php
header("Content-Type: application/json");

$token = "7852140235:AAF-Jp2IT12r9nxtc2AGzz8dw0oseRl1lEs"; // GANTI
$chat_id = "7455263553"; // GANTI

$data = json_decode(file_get_contents("php://input"), true);

$pesan = "📦 *Pesanan Baru:*\n\n"
       . "*Produk:* {$data['produk']}\n"
       . "*Deskripsi:* {$data['deskripsi']}\n"
       . "*Harga:* {$data['harga']}\n\n"
       . "*Nama:* {$data['nama']}\n"
       . "*No HP:* {$data['hp']}\n"
       . "*Alamat:* {$data['alamat']}\n"
       . "*Catatan:* " . ($data['catatan'] ?: "-");

$url = "https://api.telegram.org/bot$token/sendMessage";

$response = file_get_contents($url . "?" . http_build_query([
  'chat_id' => $chat_id,
  'text' => $pesan,
  'parse_mode' => 'Markdown'
]));

echo json_encode(['ok' => true]);
?>

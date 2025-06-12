<?php
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
//$baseUrl = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/ap2025";
$baseUrl = '/public';

// Fungsi untuk kirim response JSON
function response($status, $data, $code = 200)
{
  header("Content-Type: application/json");
  //header("Access-Control-Allow-Origin: *"); // Optional, jika pakai frontend terpisah
  http_response_code($code);
  echo json_encode([
    'status' => $status,
    'data' => $data
  ]);
}
<?php
$access_token = 'VXdNfb6gCuFsxYvfjvSIP0eO/Vt+6I6vy5Fy+kSkTyh5/lDJxgWe2LJWnZ2bD0HKK0ensLVlYgQgZgjY4tMb8ENo/gvJZXUfi2dGF9DGNgq38+4EIV8HF4Myi3msvqOroJXBppZYoiL38MWhAU3QUwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

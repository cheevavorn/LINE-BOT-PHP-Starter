<?php
$access_token = 'VXdNfb6gCuFsxYvfjvSIP0eO/Vt+6I6vy5Fy+kSkTyh5/lDJxgWe2LJWnZ2bD0HKK0ensLVlYgQgZgjY4tMb8ENo/gvJZXUfi2dGF9DGNgq38+4EIV8HF4Myi3msvqOroJXBppZYoiL38MWhAU3QUwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = array(
				// emoji text
				// 'type' => 'message',
				// 'text' => ' LINE emoji'

				// sticker
				// "type" => "sticker",
				// "packageId" => "1",
				// "stickerId" => "1"

				"type" => "image",
				"originalContentUrl" => "https://www.nature.com/polopoly_fs/7.44180.1495028629!/image/WEB_GettyImages-494098244.jpg_gen/derivatives/landscape_630/WEB_GettyImages-494098244.jpg",
				"previewImageUrl" => "http://blog.room34.com/wp-content/uploads/underdog/logo.thumbnail.png"
			);

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = array(
				'replyToken' => $replyToken,
				'messages' => array($messages),
			);
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";

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

				// image
				"type" => "image",
				"originalContentUrl" => "https://source.unsplash.com/WLUHO9A_xik",
				"previewImageUrl" => "https://source.unsplash.com/WLUHO9A_xik"
			
				// location
				// "type" => "location",
				// "title"=> "my location",
				// "address"=> "〒150-0002 東京都渋谷区渋谷２丁目２１−１",
				// "latitude"=> 35.65910807942215,
				// "longitude"=> 139.70372892916203
				
				// imageMap
				// "type"=> "imagemap",
				// "baseUrl"=> "https://source.unsplash.com/random",
				// "altText"=> "This is an imagemap",
				// "baseSize"=> array(
				// 	"height"=> 1040,
				// 	"width"=> 1040
				// ),
				// "actions"=> array(
				// 	array(
				// 		"type"=> "uri",
				// 		"linkUri"=> "https://pea.co.th/",
				// 		"area"=> array(
				// 			"x"=> 0,
				// 			"y"=> 0,
				// 			"width"=> 520,
				// 			"height"=> 1040
				// 		)
				// 	),
				// 	array(
				// 		"type"=> "message",
				// 		"text"=> "Hello",
				// 		"area"=> array(
				// 			"x"=> 520,
				// 			"y"=> 0,
				// 			"width"=> 520,
				// 			"height"=> 1040
				// 		)
				// 	)
				// )

				// template
				// "type"=> "template",
				// "altText"=> "this is a carousel template",
				// "template" => array(
				// 	"type"=> "carousel",
				// 	"columns"=> [
				// 		array(
				// 			"thumbnailImageUrl"=> "https://source.unsplash.com/WLUHO9A_xik",
				// 			"imageBackgroundColor"=> "#FFFFFF",
				// 			"title"=> "this is menu",
				// 			"text"=> "description",
				// 			"defaultAction"=> array(
				// 				"type"=> "uri",
				// 				"label"=> "View detail",
				// 				"uri"=> "http://example.com/page/123"
				// 			),
				// 			"actions"=> [
				// 				array(
				// 					"type"=> "postback",
				// 					"label"=> "Buy",
				// 					"data"=> "action=buy&itemid=111"
				// 				),
				// 				array(
				// 					"type"=> "postback",
				// 					"label"=> "Add to cart",
				// 					"data"=> "action=add&itemid=111"
				// 				),
				// 				array(
				// 					"type"=> "uri",
				// 					"label"=> "View detail",
				// 					"uri"=> "http://example.com/page/111"
				// 				)
				// 			]
				// 		),
				// 		array(
				// 			"thumbnailImageUrl"=> "https://source.unsplash.com/collection/190727",
				// 			"imageBackgroundColor"=> "#000000",
				// 			"title"=> "this is menu",
				// 			"text"=> "description",
				// 			"defaultAction"=> array(
				// 				"type"=> "uri",
				// 				"label"=> "View detail",
				// 				"uri"=> "http://example.com/page/222"
				// 			),
				// 			"actions"=> [
				// 				array(
				// 					"type"=> "postback",
				// 					"label"=> "Buy",
				// 					"data"=> "action=buy&itemid=222"
				// 				),
				// 				array(
				// 					"type"=> "postback",
				// 					"label"=> "Add to cart",
				// 					"data"=> "action=add&itemid=222"
				// 				),
				// 				array(
				// 					"type"=> "uri",
				// 					"label"=> "View detail",
				// 					"uri"=> "http://example.com/page/222"
				// 				)
				// 			]
				// 		),
				// 		array(
				// 			"thumbnailImageUrl"=> "https://source.unsplash.com/user/erondu/daily",
				// 			"imageBackgroundColor"=> "#000000",
				// 			"title"=> "this is menu",
				// 			"text"=> "description",
				// 			"defaultAction"=> array(
				// 				"type"=> "uri",
				// 				"label"=> "View detail",
				// 				"uri"=> "http://example.com/page/222"
				// 			),
				// 			"actions"=> [
				// 				array(
				// 					"type"=> "postback",
				// 					"label"=> "Buy",
				// 					"data"=> "action=buy&itemid=222"
				// 				),
				// 				array(
				// 					"type"=> "postback",
				// 					"label"=> "Add to cart",
				// 					"data"=> "action=add&itemid=222"
				// 				),
				// 				array(
				// 					"type"=> "uri",
				// 					"label"=> "View detail",
				// 					"uri"=> "http://example.com/page/222"
				// 				)
				// 			]
				// 		)
				// 	],
				// 	"imageAspectRatio"=> "rectangle",
				// 	"imageSize"=> "cover"
				// )
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

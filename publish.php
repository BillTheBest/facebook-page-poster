<?php

require_once 'config.php';
require_once 'src/facebook.php';

$facebook = new Facebook(array(
	'appId'  => APP_ID,
	'secret' => APP_SECRET,
));

?><!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Facebook Page Poster</title>
		<style>
			body { font-family: sans-serif; color: #333; }
		</style>
	</head>
	<body>
		<?php
			// Publish a wall post to the Page
			try {
				$wallPostParams = array(
					'caption'      => 'Hello there',
					'description'  => 'This post was made from an app',
					'link'         => 'https://twitter.com/kstre',
					'name'         => 'Keegan on Twitter',
					'picture'      => 'https://twimg0-a.akamaihd.net/profile_images/1545455712/td.jpg',
					'access_token' => PAGE_ACCESS_TOKEN
				);
				$wallPost = $facebook->api('/' . PAGE_ID . '/feed', 'POST', $wallPostParams);
			} catch (FacebookApiException $e) {
				echo '<pre>' . print_r($e, 1) . '</pre>';
			}

			if (empty($wallPost)) {
				echo '<h1>We were not able to post to the Page wall.</h1>';
				echo '<p>Are you sure this is the correct Page ID? <b>' . PAGE_ID . '</b></p>';
				echo '<p>Are you sure this is the correct access token? <b>' . PAGE_ACCESS_TOKEN . '</b></p>';
			} else {
				echo '<h1>We have successfuly posted to this Page: ' . PAGE_ID . '</h1>';
				echo '<p>:-)</p>';
				echo '<pre>' . print_r($wallPost, 1) . '</pre>';
			}
		?>
	</body>
</html>



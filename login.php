<?php

require_once 'config.php';
require_once 'src/facebook.php';

$facebook = new Facebook(array(
	'appId'  => APP_ID,
	'secret' => APP_SECRET,
));

// Try to get User ID
$user = $facebook->getUser();

// If a user is not logged in, redirect to Facebook Auth page
if (empty($user)) {
	$loginUrl = $facebook->getLoginUrl(array(
		'scope' => 'manage_pages, publish_stream'
	));
	header('Location: ' . $loginUrl);
	exit;
}

?><!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Facebook Page Poster</title>
		<style>
			body { font-family: sans-serif; color: #333; }
			input { width: 600px; }
		</style>
	</head>
	<body>
		<?php
			// Retrieve the access_token for the Page
			try {
				$result = $facebook->api('/' . PAGE_ID . '?fields=access_token');
			} catch (FacebookApiException $e) {
				echo '<pre>' . print_r($e, 1) . '</pre>';
			}

			if (empty($result)) {
				echo '<h1>We were not able to retrieve the Page access token.</h1>';
				echo '<p>Are you sure this is the correct Page ID? <b>' . PAGE_ID . '</b></p>';
				echo '<p>Are you sure you are an administrator for this Page?</p>';
			} else {
				echo '<h1>The access token for Page ' . PAGE_ID . ' is:</h1>';
				echo '<input type="text" value="' . $result['access_token'] . '" />';
				echo '<p>Use this access token when you want to make API calls on behalf of this page.</p>';
			}
		?>
	</body>
</html>



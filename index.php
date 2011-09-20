<?php

require_once 'config.php';

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
		<h1>Facebook Page Poster</h1>
		<p>This is a demonstration of an app that posts to the wall of a Facebook Page.</p>

		<h2>Step 1: Authentication</h2>
		<p>We are going to be posting to a Facebook Page from an Application. In order to do this, a user who administers the Page must grant the <code>publish_stream</code> and <code>manage_pages</code> <a href="http://developers.facebook.com/docs/reference/api/permissions/" target="_blank">extended permissions</a> to the app. We then need to get an <code>access_token</code> for the Page which we will use whenever the app makes API calls on the Page's behalf.</p>
		<p>To find this access token, visit <a href="login.php">login.php</a> and grant the extended permissions.</p>

		<h2>Step 2: Publishing</h2>
		<p>Copy the access token from step 1. For this example, you can paste it into config.php.</p>
		<p>You can visit <a href="publish.php">publish.php</a> to see an example of the Application posting to the Page's wall.</p>
	</body>
</html>


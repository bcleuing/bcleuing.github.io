<?php
	if(!session_id()) {
		session_start();
	}
	require_once 'src/Facebook/autoload.php';

	$config = array(
		'app_id' => '1232876953416441',
		'app_secret' => '8d58dc88cc62784b11379a3ee623960d',
		'default_graph_version' => 'v2.8',
		// 'default_access_token' => 'EAARhS4jcMvkBAHnZAfS2eYZAeqah98ZCp5loH4oUS058agdADwXbukbNirS74BYjhTmJAyMO3X44bLsVwTHZCwsGdQiVcktESJVtrcXX7sAoZCPphklX74YVAZCmTJervHa5dZCTFZANkJ3tWTgdE3Cv0NHaCPusZCbFnvBeZAtZBWEngZDZD'
	);
	
	$fb = new Facebook\Facebook($config);
	
	// Returns a `Facebook\FacebookResponse` object
	/*
	$response = $fb->get('/me/accounts');
	
	$pagesEdge = $response->getGraphEdge();
	// Only grab 5 pages
	$maxPages = 5;
	$pageCount = 0;

	do {
	  echo '<h1>Page #' . $pageCount . ':</h1>' . "\n\n";

	  foreach ($pagesEdge as $page) {
		print_r($page->asArray());

		$likes = $page['likes'];
		do {
		  echo '<p>Likes:</p>' . "\n\n";
		  var_dump($likes->asArray());
		} while ($likes = $fb->next($likes));
	  }
	  $pageCount++;
	} while ($pageCount < $maxPages && $pagesEdge = $fb->next($pagesEdge));
	

	/*

	try {
	  // Returns a `Facebook\FacebookResponse` object
	  $response = $fb->get('/me?fields=id,name');
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	$user = $response->getGraphUser();

	echo 'Name: ' . $user['name'];
	*/
	
	
	$helper = $fb->getRedirectLoginHelper();

	$permissions = ['email', 'manage_pages', 'read_insights', 'user_likes']; // Optional permissions
	$loginUrl = $helper->getLoginUrl('http://localhost:8080/is434/facebook-app/fb-callback.php', $permissions);

	echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
	
	
?>
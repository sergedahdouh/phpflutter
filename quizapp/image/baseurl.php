<?php
    if(isset($_SERVER['HTTPS'] ) ) {
    	$badge = 'https://'.$_SERVER['SERVER_NAME'] . '/quizapp/image/image_badge/';  
		$category = 'https://'.$_SERVER['SERVER_NAME'] . '/quizapp/image/';
		$image = 'https://'.$_SERVER['SERVER_NAME'] . '/quizapp/image/image_quiz/';
		$user = 'https://'.$_SERVER['SERVER_NAME'] . '/quizapp/image/user/';
	}
	else
	{
		$badge = 'http://'.$_SERVER['SERVER_NAME'] . '/quizapp/image/image_badge/';
		$category = 'http://'.$_SERVER['SERVER_NAME'] . '/quizapp/image/';
		$image = 'http://'.$_SERVER['SERVER_NAME'] . '/quizapp/image/image_quiz/';
		$user = 'http://'.$_SERVER['SERVER_NAME'] . '/quizapp/image/user/';
	}
?>
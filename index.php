<?php
require __DIR__ .'/vendor/autoload.php';

use Core\Router;
use Controllers\NewsController;
use Controllers\CommentsController;

function pathUrl($dir = __DIR__) {
    $root = "";
    $dir = str_replace('\\', '/', realpath($dir));
    //HTTPS or HTTP
    $root .= !empty($_SERVER['HTTPS']) ? 'https' : 'http';
    //HOST
    $root .= '://' . $_SERVER['HTTP_HOST'];
    //ALIAS
    if (!empty($_SERVER['CONTEXT_PREFIX'])) {
        $root .= $_SERVER['CONTEXT_PREFIX'];
        $root .= substr($dir, strlen($_SERVER[ 'CONTEXT_DOCUMENT_ROOT' ]));
    } else {
        $root .= substr($dir, strlen($_SERVER[ 'DOCUMENT_ROOT' ]));
    }

    $root .= '/';

    return $root;
}

Router::set('index.php', function() {
	$newsController = new NewsController();
	$newsController->index();
});

Router::set('news', function() {
	$newsController = new NewsController();
	$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$segments = explode('/', $urlPath);

	switch ($segments[3]) {
		case 'add':
			if (!empty($_POST['data']['title']) && !empty($_POST['data']['content'])){
				$newsController->add($_POST['data']);
				$status = true;
				$message = '<div class="alert alert-success">News successfully updated.</div>';
			} else {
				$status = false;
				$message = '<div class="alert alert-danger">Some fields are empty.</div>';
			}
			echo json_encode(array(
				'status' => $status,
				'message' => $message
			));
			break;
		case 'edit':
			if (!empty($_POST['data']['title']) && !empty($_POST['data']['content'])){
				$newsController->edit($_POST['data']);
				$status = true;
				$message = '<div class="alert alert-success">News successfully updated.</div>';
			} else {
				$status = false;
				$message = '<div class="alert alert-danger">Some fields are empty.</div>';
			}
			echo json_encode(array(
				'status' => $status,
				'message' => $message
			));
			break;
		case 'delete':
			$newsController->delete($_POST['id']);
			break;
		case 'list-news':
			$newsController->newsLists();
			break;
		default:
			break;
	}

});

Router::set('comment', function() {
	$commentsController = new CommentsController();
	$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$segments = explode('/', $urlPath);

	switch ($segments[3]) {
		case 'add-comment':
			if (!empty($_POST['data']['comment'])) {
				$commentsController->addComment($_POST['data']);
				$status = true;
				$message = '<div class="alert alert-success">Comment successfully added.</div>';
			} else {
				$status = false;
				$message = '<div class="alert alert-danger">Comment must not empty.</div>';
			}
			echo json_encode(array(
				'status' => $status,
				'message' => $message
			));
			
			break;
		case 'delete-comment':
			$commentsController->deleteComment($_POST['id']);
			break;
		case 'list-comment':
			$commentsController->commentsLists($segments[4]);
			break;
		default:
			$commentsController->getByNewsId($segments[3]);
			break;
	}

});

function __autoload($className) {
  if (file_exists('classes/'.$className.'s.php')){
  		require_once 'classes/'.$className.'s.php';
  } else if (file_exists('Controllers/'.$className.'.php')){
  		require_once 'Controllers/'.$className.'.php';
  }
}

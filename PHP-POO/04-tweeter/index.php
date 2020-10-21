<?php

use Twitter\Http\Request;

use Twitter\Controller\TweetController;
use Twitter\Database\Connection;
use Twitter\Model\TweetModel;
use Twitter\View\Renderer;

require "vendor/autoload.php";

$model = new TweetModel(new Connection('localhost', 'twitter', 'root', ''));
$controller = new  TweetController(new Request(), new Renderer(), $model);

$response = $controller->createTweet();
$response->send();

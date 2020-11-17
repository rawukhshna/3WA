<?php

namespace Tests\Controller;

use PHPUnit\Framework\TestCase;
use Tests\Factory\ConnectionFactory;
use Tests\Factory\TweetFactory;
use Twitter\Controller\LikeController;
use Twitter\Http\Request;
use Twitter\Model\TweetModel;

class LikeControllerTest extends TestCase
{

  public function test_we_can_like_a_tweet()
  {
    // GIVEN, we have a tweet
    TweetFactory::create();

    $id = ConnectionFactory::getConnection()->getLastInsertId();
    // WHEN we send a post request to LikeController
    $tweetModel = new TweetModel(ConnectionFactory::getConnection());
    $controller = new LikeController($tweetModel);
    $response = $controller->addLike(new Request('POST', [
      'tweet_id' => $id
    ]));
    // THEN the tweet should have one like in the db
    $tweet = ConnectionFactory::getConnection()->query('SELECT * FROM tweet WHERE id = :id', [
      'id' => $id
    ]);
    $this->assertEquals(1, $tweet['likes']);
    $this->assertEquals(302, $response->getStatusCode());
    $this->assertEquals('/', $response->getHeader('Location'));
  }
}

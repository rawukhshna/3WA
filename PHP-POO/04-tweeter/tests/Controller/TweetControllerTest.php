<?php

use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;
use Tests\Factory\ConnectionFactory;
use Tests\Factory\TweetFactory;
use Twitter\Controller\TweetController;
use Twitter\Database\Connection;
use Twitter\Exception\MissingTweetIdException;
use Twitter\Http\Request;
use Twitter\Model\Entity\Tweet;
use Twitter\Model\TweetModel;
use Twitter\View\Renderer;

class TweetControllerTest extends TestCase
{
  protected Connection $connection;
  protected TweetModel $tweetModel;
  protected Renderer $renderer;
  protected TweetController $controller;

  protected function setUp(): void
  {
    $this->connection = ConnectionFactory::getConnection();
    $this->tweetModel = new TweetModel($this->connection);
    $this->renderer = new Renderer;
    $this->controller = new TweetController($this->renderer, $this->tweetModel);

    $this->connection->execute("DELETE FROM tweet");
  }

  public function test_controller_displays_form_when_get_request()
  {

    // Création d'un FAKE/MOCK renderer
    /* $mockRenderer = $this->createMock(Renderer::class);
    $mockRenderer->expects($this->once())->method('display'); */

    // situation initiale: nous avons une requete en get
    $request = new Request("GET");

    // Action : nous appelons la méthode createTweet()
    $response = $this->controller->createTweet($request);

    // Tests: nous nous assurons que la méthode display du renderer a bien été appelée
    $this->assertEquals(200, $response->getStatusCode());
    $this->assertStringContainsString("<h1>", $response->getContent());
    $this->assertStringContainsString("<form", $response->getContent());
  }

  public function test_controller_saves_tweet_when_post_request()
  {
    //GIVEN, we have a POST request
    $tweetContent = "Contenu du tweet " . mt_rand();
    $request = new Request("POST", [
      'content' => $tweetContent
    ]);

    // WHEN we call createTweet
    $response = $this->controller->createTweet($request);

    // THEN the tweet is inside the table
    $this->assertEquals(302, $response->getStatusCode());
    $this->assertEquals('/', $response->getHeader('Location'));
    $data = $this->connection->query('SELECT * FROM tweet ORDER BY published_at DESC LIMIT 1'); // query ne fait qu'un fetch dans notre methode et pas un fetchAll
    $this->assertEquals($tweetContent, $data['content']);
  }

  public function test_we_can_delete_a_tweet()
  {
    // Given, we have a tweet in the table
    TweetFactory::create();

    $id = $this->connection->getLastInsertId();

    // When I send a Post request to my controller
    $request = new Request('POST', [
      'tweet_id' => $id
    ]);

    // And I call the delete method
    $response = $this->controller->deleteTweet($request);

    // Then, it should be deleted from database 
    // And it redirects on homepage
    $this->assertEquals(302, $response->getStatusCode());
    $this->assertEquals('/', $response->getHeader('Location'));

    $result = $this->connection->query('SELECT * FROM tweet WHERE id = :id', [
      'id' => $id
    ]);
    $this->assertFalse($result);
  }

  public function test_it_will_throw_an_exception_if_we_delete_without_id()
  {

    // When I call the deleteTweet method without tweet_id in the request
    // Then it should throw an exception

    // $this->expectException("Twitter\Exception\MissingTweetIdException") is equal to : 
    $this->expectException(MissingTweetIdException::class);
    $this->controller->deleteTweet(new Request());
  }

  public function test_we_can_see_tweets_of_homepage()
  {
    // GIVEN, there are 5 tweets in the db
    $tweetContent = 'tweet de folie' . mt_rand();

    TweetFactory::createMany(5, [
      'author' => 'Testing',
      'content' => $tweetContent,
      'likes' => 12
    ]);

    // WHEN I call createTweet method with a GET request
    $response = $this->controller->createTweet(new Request());

    //THEN I should see 5 tweets in the HTML code ( response's content)
    $crawler = new Crawler($response->getContent());
    $count = $crawler->filter('div.tweet')->count();

    $this->assertEquals(5, $count);
    $this->assertStringContainsString($tweetContent, $response->getContent());
  }

  public function test_we_can_obtain_json_with_format_parameter()
  {
    // GIVEN, we have a GET request with format=json parameter
    $request = new Request("GET", [
      'format' => 'json'
    ]);
    // And we have 3 tweets in the db
    $tweetContent = 'tweet de folie' . mt_rand();

    TweetFactory::createMany(5, [
      'author' => 'toto',
      'content' => $tweetContent,
      'likes' => 10
    ]);

    // WHEN, I call my controller
    $response = $this->controller->createTweet($request);

    // THEN the response content should be JSON
    $this->assertJson($response->getContent());
    // And the Content-Type header should be "application/json
    $this->assertEquals('application/json', $response->getHeader('Content-Type'));
    // And the response content should contain $TweetContent
    $this->assertStringContainsString($tweetContent, $response->getContent());

  }
}

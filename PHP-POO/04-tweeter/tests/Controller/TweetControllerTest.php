<?php

use Twitter\Http\Request;
use PHPUnit\Framework\TestCase;
use Twitter\Controller\TweetController;
use Twitter\Database\Connection;
use Twitter\Exception\MissingTweetIdException;
use Twitter\Model\TweetModel;
use Twitter\View\Renderer;

class TweetControllerTest extends TestCase
{
    public function test_verification()
    {
        // $mockRenderer = $this->createMock(Renderer::class);
        // $mockRenderer->expects($this->once())->method('Display');

        $request = new Request('GET');
        $renderer = new Renderer;
        $connexion = new Connection('localhost', 'twitter-test', 'root', ''); //on devrait renvoyer vers une autre bdd de test
        $model = new TweetModel($connexion);

        $controller = new TweetController($request, $renderer, $model);
        $response = $controller->createTweet();
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('<h1>', $response->getContent());
    }

    public function test_controller_saves_tweet_when_post_request()
    {   //Given
        $tweet_content = 'Hello' . mt_rand();
        $request = new Request('POST', ['content' => $tweet_content]);
        $renderer = new Renderer;
        $connection = new Connection('localhost', 'twitter-test', 'root', '');
        $model = new TweetModel($connection);
        $controller = new TweetController($request, $renderer, $model);

        //When
        $response = $controller->createTweet();

        //Then
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals('/', $response->getHeader('Location'));
        $data = $connection->query('SELECT * FROM tweet ORDER BY published_at DESC');
        $this->assertEquals($tweet_content, $data['content']);
    }
    public function test_we_can_delete_a_tweet()
    {

        $connection = new Connection('localhost', 'twitter-test', 'root', '');
        $model = new TweetModel($connection);
        $model->save("Testing", "un tweet osef");
        $id = $connection->getLastInsertId();

        $request = new Request('POST', [
            'tweet_id' => $id
        ]);

        $controller = new TweetController($request, new Renderer, $model);
        $response = $controller->deleteTweet();

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals('/', $response->getHeader('Location'));
        $result = $connection->query('SELECT * FROM tweet WHERE id= :id', ['id' => $id]);
        $this->assertFalse($result);
    }

    public function test_it_will_throw_an_exception_if_we_delete_without_id()
    {
        $connection = new Connection('localhost', 'twitter-test', 'root', '');
        $model = new TweetModel($connection);
        $controller = new TweetController(new Request(), new Renderer, $model);

        $this->expectException(MissingTweetIdException::class);
        //$this->expectException("Twitter\Exception\MissingTweetIdException");
        $controller->deleteTweet();
    }
}

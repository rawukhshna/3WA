<?php


use PHPUnit\Framework\TestCase;
use Twitter\Database\Connection;
use Twitter\Model\TweetModel;

class TweetModelTest extends TestCase
{

    public function test_we_can_find_all_the_tweets()
    {

        $connection = new Connection('localhost', 'twitter-test', 'root', '');
        $tweetModel = new TweetModel($connection);
        $connection->execute('DELETE FROM tweet');
        
        $connection->execute('INSERT INTO tweet SET content = :content, author = :author, published_at = NOW()', [
            'content' => 'tweeeeeet',
            'author' => 'de moi',
        ]);
        $connection->execute('INSERT INTO tweet SET content = :content, author = :author, published_at = NOW()', [
            'content' => 'tweeeeeet',
            'author' => 'de moi',
        ]);
        $connection->execute('INSERT INTO tweet SET content = :content, author = :author, published_at = NOW()', [
            'content' => 'tweeeeeet',
            'author' => 'de moi',
        ]);


        $result = $tweetModel->findAll();
        $this->assertIsArray($result);
        $this->assertCount(3, $result);
    }
}

<?php

namespace Tests\Factory;

class TweetFactory
{

  static public function create(array $data = ['author' => 'Test author', 'content' => 'Test content', 'likes' => 0])
  {
    $connection = ConnectionFactory::getConnection();
    $connection->execute('INSERT INTO tweet SET author = :author, content= :content, published_at = NOW(), likes = :likes', $data);
  }

  static public function createMany(int $count = 1, array $data = ['author' => 'Test author', 'content' => 'Test content', 'likes' => 0])
  {
    for($i=0; $i< $count; $i++) {
      static::create($data);
    }
  }
}

<?php

namespace Twitter\Model;

use Twitter\Database\Connection;

class TweetModel
{
    protected Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function save(string $author, string $content)
    {
        $this->connection->execute('INSERT INTO tweet SET content = :content, author = :author, published_at = NOW()', [
            'content' => $content,
            'author' => $author,
        ]);
    }

    public function find(int $id)
    {

        $tweet = $this->connection->query('SELECT * FROM tweet WHERE id = :id', ['id' => $id]);

        return $tweet;
    }

    public function findAll(): array
    {
        return $this->connection->queryAll('SELECT * FROM tweet');
    }

    public function delete(int $id)
    {
        $this->connection->execute('DELETE FROM tweet WHERE id = :id', ['id' => $id]);
    }
}

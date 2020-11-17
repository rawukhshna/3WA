<?php

namespace Tests\Factory;

use Twitter\Database\Connection;

class ConnectionFactory
{
  static protected Connection $connection;

  static public function getConnection(): Connection
  {
    if (empty(static::$connection)) {
      static::$connection = new Connection("localhost", "twitter-test", "root", "");
    }

    return static::$connection;
  }
}

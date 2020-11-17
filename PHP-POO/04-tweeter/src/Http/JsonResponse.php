<?php 

namespace Twitter\Http;

class JsonResponse extends Response {

  public function __construct($data, int $statusCode = 200)
  {
    $json = json_encode($data);

    $this->setContent($json);
    $this->setHeader('Content-Type', 'application/json');
    $this->statusCode = $statusCode;
  }
}
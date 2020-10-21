<?php

namespace Twitter\Http;

class Response
{
    //Properties
    protected int $statusCode = 200;
    protected string $content = "";
    protected array $header = [
        'Location' => '/',
        'Content-type' => 'text/html'
    ];

    // getters, setters
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $code)
    {
        $this->statusCode = $code;
    }
    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content)
    {
        $this->content = $content;
    }
    public function getHeader(string $name): ?string
    {
        return $this->header[$name] ?? null;
    }

    public function setHeader(string $name, string $value)
    {
        $this->header[$name] = $value;
    }

    // other methods
    public function send()
    {
        http_response_code($this->statusCode);

        foreach ($this->header as $name => $value) {
            header("$name : $value");
        }

        echo ($this->content);
    }
}

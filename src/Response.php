<?php

namespace Immutio;

final class Response
{
    private $statusCode;
    private $body;
    private $headers;

    public function __construct($statusCode, $body, array $headers)
    {
        $this->statusCode = (int) $statusCode;
        $this->body = (string) $body;
        $this->headers = $headers;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getContentType()
    {
        foreach($this->headers as $key => $value) {
            if ($key == 'Content-Type') {
                return $value;
            }
        }
    }
}


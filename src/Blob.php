<?php

namespace Immutio;

final class Blob
{
    private $type;
    private $content;

    public function __construct($content, $type = null)
    {
        $this->content = (string) $content;
        $this->type = (string) $type;
    }

    public static function fromResponse(Response $response)
    {
        return new self($response->getBody(), $response->getContentType());
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getType()
    {
        return $this->type;
    }
}

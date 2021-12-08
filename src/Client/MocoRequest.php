<?php

namespace App\Client;

class MocoRequest
{

    const GET = 'GET';
    const POST = 'POST';
    const PUT =  'PUT';
    private string $uri;
    private array $parameters;
    private string $method;
    private string $body;

    public function __construct(string $uri, string $method, array $parameters = [], string $body = '')
    {
        $this->uri = $uri;
        $this->parameters = $parameters;
        $this->method = $method;
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return \DateTime[]|null[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }
}
<?php

namespace App\Client;

use Symfony\Contracts\HttpClient\ResponseInterface;

class MocoResponse
{
    private $data = null;
    private int $status;

    public function __construct(int $status, string $data)
    {
        $this->status = $status;
        $this->data = json_decode($data, false);;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getStatus(): int
    {
        return $this->status;
    }
}
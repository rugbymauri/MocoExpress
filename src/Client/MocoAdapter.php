<?php

namespace App\Client;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class MocoAdapter
{

    public function __construct(
        private HttpClientInterface $httpClient,
        private string $mocoDomain,
        private string $mocoToken
    )
    {
    }

    public function doRequest(MocoRequest $request): MocoResponse
    {
        $options = [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Token token='.$this->mocoToken,
            ],
        ];

        $options['query'] = $request->getParameters();

        if ($request->getBody() !== '') {
            $options['json'] = $request->getBody();
        }

        $reponse = $this->httpClient->request(
            $request->getMethod(),
            'https://' . $this->domain . '.mocoapp.com' . $request->getUri(),
            $options
        );

        return new MocoResponse($reponse->getStatusCode(), $reponse->getContent(false));
    }
}
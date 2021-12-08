<?php

namespace App\Client;

use App\Model\UserPresence;
use App\Model\UserPresenceList;
use Symfony\Contracts\HttpClient\ResponseInterface;

class MocoClient
{
    private MocoAdapter $mocoAdapter;

    public function __construct(MocoAdapter $mocoAdapter)
    {
        $this->mocoAdapter = $mocoAdapter;
    }

    public function getUserPresences(?\DateTime $from = null, ?\DateTime $to = null)
    {
        if (!$from) {
            $from = new \DateTime();
        }

        if (!$to) {
            $to = new \DateTime();
        }
        $request = new MocoRequest('/api/v1/users/presences',
            MocoRequest::GET, [
                'from' => $from->format('Y-m-d'),
                'to' => $to->format('Y-m-d'),
                ]
        );
        $response = $this->mocoAdapter->doRequest($request);

        return UserPresenceList::create($response->getData());
    }

    public function getUserPresenceById(int $id)
    {
        $request = new MocoRequest('/api/v1/users/presences/' . $id,
            MocoRequest::GET
        );

        $response = $this->mocoAdapter->doRequest($request);

        return UserPresence::create($response->getData());
    }


    public function putUserPresence(int $id, UserPresence $userPresence)
    {
        $request = new MocoRequest('/api/v1/users/presences/' . $id,
            MocoRequest::PUT,
            [],
            json_encode(
                [
                    'date' => $userPresence->getDate()->format('Y-m-d'),
                    'from' => $userPresence->getFrom(),
                    'to' => $userPresence->getTo(),
                    'is_home_office' => $userPresence->isHomeOffice(),
                ]
            )
        );

        $response = $this->mocoAdapter->doRequest($request);

        return UserPresence::create($response->getData());
    }

    public function touchUserPresence(): bool
    {
        $request = new MocoRequest('/api/v1/users/presences/touch',
            MocoRequest::POST
        );

        $response = $this->mocoAdapter->doRequest($request);

        return $response->getStatus() == 200;
    }

    public function setUserPresence(UserPresence $userPresence)
    {
        $request = new MocoRequest('/api/v1/users/presences',
            MocoRequest::POST,
            [],
            json_encode(
                [
                    'date' => $userPresence->getDate()->format('Y-m-d'),
                    'from' => $userPresence->getFrom(),
                    'to' => $userPresence->getTo(),
                    'is_home_office' => $userPresence->isHomeOffice(),
                ]
            )
        );

        $response = $this->mocoAdapter->doRequest($request);

        return UserPresence::create($response->getData());
    }


}
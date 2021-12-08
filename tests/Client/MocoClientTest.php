<?php

namespace App\Tests\Client;

use App\Client\MocoAdapter;
use App\Client\MocoClient;
use App\Client\MocoResponse;
use App\Model\UserPresence;
use App\Model\UserPresenceList;
use App\Tests\Mock\UserPresencesMock;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class MocoClientTest extends KernelTestCase
{
    public function testGetPresences()
    {
        $this->mock(200, UserPresencesMock::GET_USER_PRESENCES);

        /** @var MocoClient $client */
        $client = self::getContainer()->get(MocoClient::class);
        $userPresences = $client->getUserPresences();

        $this->assertInstanceOf(UserPresenceList::class, $userPresences);
    }


    public function testUserPresenceId() {

        $this->mock(200, UserPresencesMock::GET_USER_PRESENCE_BY_ID);

        /** @var MocoClient $client */
        $client = self::getContainer()->get(MocoClient::class);
        $userPresences = $client->getUserPresenceById(4283557);

        $this->assertInstanceOf(UserPresence::class, $userPresences);
    }

    public function testUserPresenceTouch() {
        $this->mock(200, '');

        /** @var MocoClient $client */
        $client = self::getContainer()->get(MocoClient::class);
        $touch = $client->touchUserPresence();

        $this->assertTrue($touch);
    }


    public function testUserPresenceSet()
    {
        $this->mock(200, UserPresencesMock::SET_USER_PRESENCE);

        /** @var MocoClient $client */
        $client = self::getContainer()->get(MocoClient::class);
        $userPresence = new UserPresence();
        $userPresence->setDate(new \DateTime('2021-10-11'));
        $userPresence->setFrom('23:00');
        $userPresence->setTo('23:10');
        $userPresence->setIsHomeOffice(true);
        $userPresenceData = $this->$client->setUserPresence($userPresence);

        $this->assertInstanceOf(UserPresence::class, $userPresenceData);
    }

    public function testUserPresencePut()
    {
        $this->mock(200, UserPresencesMock::PUT_USER_PRESENCE);

        /** @var MocoClient $client */
        $client = self::getContainer()->get(MocoClient::class);
        $userPresence = new UserPresence();
        $userPresence->setDate(new \DateTime('2021-10-11'));
        $userPresence->setFrom('23:05');
        $userPresence->setTo('23:15');
        $userPresence->setIsHomeOffice(true);
        $userPresenceData = $client->putUserPresence(4461793, $userPresence);

        $this->assertInstanceOf(UserPresence::class, $userPresenceData);
    }


    private function mock(int $status, string $data): void
    {
        $adpterMock = $this->createMock(MocoAdapter::class);
        $adpterMock->method('doRequest')
            ->willReturn(new MocoResponse(
                $status,
                $data
            ));

        self::getContainer()->set(MocoAdapter::class, $adpterMock);
    }

}
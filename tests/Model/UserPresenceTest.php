<?php

namespace App\Tests\Model;

use App\Model\User;
use App\Model\UserPresence;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserPresenceTest extends KernelTestCase
{

    const JSONDATA = '{
  "id": 982237015,
  "date": "2018-07-03",
  "from": "07:30",
  "to": "13:15",
  "is_home_office": true,
  "user": {
    "id": 933590696,
    "firstname": "John",
    "lastname": "Doe"
  },
  "created_at": "2018-10-17T09:33:46Z",
  "updated_at": "2018-10-17T09:33:46Z"
}';

    public function testCreate()
    {
        $data = json_decode(self::JSONDATA);
        $userPresence = UserPresence::create($data);
        $this->assertInstanceOf(UserPresence::class, $userPresence);
    }

    public function testData()
    {
        $data = json_decode(self::JSONDATA);
        $userPresence = UserPresence::create($data);
        $this->assertEquals(982237015, $userPresence->getId());
        $this->assertEquals('2018-07-03', $userPresence->getDate()->format('Y-m-d'));
        $this->assertEquals('07:30', $userPresence->getFrom());
        $this->assertEquals('13:15', $userPresence->getTo());
        $this->assertEquals(true, $userPresence->isHomeOffice());

        $this->assertEquals('2018-10-17 09:33:46', $userPresence->getCreatedAt()->format('Y-m-d H:i:s'));
        $this->assertEquals('2018-10-17 09:33:46', $userPresence->getUpdatedAt()->format('Y-m-d H:i:s'));

    }

    public function testUser()
    {
        $data = json_decode(self::JSONDATA);
        $userPresence = UserPresence::create($data);
        $this->assertInstanceOf(User::class, $userPresence->getUser());
    }



}
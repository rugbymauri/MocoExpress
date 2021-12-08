<?php

namespace App\Tests\Model;

use App\Model\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase
{

    const JSONDATA = '{
  "id": 123,
  "firstname": "Max",
  "lastname": "Muster",
  "active": true,
  "extern": false,
  "email": "max.muster@beispiel.de",
  "mobile_phone": "+49 177 123 45 67",
  "work_phone": "+49 40 123 45 67",
  "home_address": "",
  "info": "",
  "birthday": "1970-01-01",
  "avatar_url": "https//meinefirma.mocoapp.com/.../profil.jpg",
  "custom_properties": {
    "Starting Month": "January 2015"
  },
  "unit": {
    "id": 456,
    "name": "Geschäftsleitung"
  },
  "created_at": "2018-10-17T09:33:46Z",
  "updated_at": "2018-10-17T09:33:46Z"
}';

    public function testCreate()
    {
        $jsonData = json_decode(self::JSONDATA);
        $userPresence = User::create($jsonData);
        $this->assertInstanceOf(User::class, $userPresence);
    }

    public function testData()
    {
        $data = json_decode(self::JSONDATA);
        $userPresence = User::create($data);
        $this->assertEquals(123, $userPresence->getId());
        $this->assertEquals('Max', $userPresence->getFirstname());
        $this->assertEquals('Muster', $userPresence->getLastname());
        $this->assertEquals(true, $userPresence->isActive());
        $this->assertEquals(false, $userPresence->isExtern());
        $this->assertEquals('max.muster@beispiel.de', $userPresence->getEmail());
        $this->assertEquals('+49 177 123 45 67', $userPresence->getMobilePhone());
        $this->assertEquals('+49 40 123 45 67', $userPresence->getWorkPhone());
        $this->assertEquals('1970-01-01', $userPresence->getBirthday()->format('Y-m-d'));
        $this->assertEquals('https//meinefirma.mocoapp.com/.../profil.jpg', $userPresence->getAvatarUrl());

        $this->assertEquals('2018-10-17 09:33:46', $userPresence->getCreatedAt()->format('Y-m-d H:i:s'));
        $this->assertEquals('2018-10-17 09:33:46', $userPresence->getUpdatedAt()->format('Y-m-d H:i:s'));

    }


}
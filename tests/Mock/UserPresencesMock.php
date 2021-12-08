<?php

namespace App\Tests\Mock;

class UserPresencesMock
{
    const GET_USER_PRESENCES = '[{"id":4457945,"date":"2021-10-11","from":"09:40","to":"12:20","is_home_office":false,"user":{"id":933630418,"firstname":"Maurizio","lastname":"Monticelli"},"created_at":"2021-10-11T07:47:58Z","updated_at":"2021-10-11T18:25:42Z"},{"id":4461675,"date":"2021-10-11","from":"13:25","to":"19:30","is_home_office":false,"user":{"id":933630418,"firstname":"Maurizio","lastname":"Monticelli"},"created_at":"2021-10-11T18:25:42Z","updated_at":"2021-10-11T18:25:42Z"}]';
    const GET_USER_PRESENCE_BY_ID = '{"id":4283557,"date":"2021-08-10","from":"09:30","to":"12:15","is_home_office":false,"user":{"id":933630418,"firstname":"Maurizio","lastname":"Monticelli"},"created_at":"2021-08-31T14:36:17Z","updated_at":"2021-08-31T14:36:17Z"}';
    const SET_USER_PRESENCE = '{
    "id": 4461793,
    "date": "2021-10-11",
    "from": "23:00",
    "to": "23:10",
    "is_home_office": true,
    "user": {
        "id": 933630418,
        "firstname": "Maurizio",
        "lastname": "Monticelli"
    },
    "created_at": "2021-10-11T21:33:10Z",
    "updated_at": "2021-10-11T21:33:10Z"
}';
    const PUT_USER_PRESENCE = '{"id":4461793,"date":"2021-10-11","from":"23:00","to":"23:10","is_home_office":true,"user":{"id":933630418,"firstname":"Maurizio","lastname":"Monticelli"},"created_at":"2021-10-11T21:33:10Z","updated_at":"2021-10-11T21:33:10Z"}';


}
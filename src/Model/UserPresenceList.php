<?php

namespace App\Model;

class UserPresenceList extends BaseList
{
    private function __construct()
    {
    }

    public static function create(array $jsonData): self
    {

        $data = new self();
        foreach ($jsonData as $item) {
            $data->list[] = UserPresence::create($item);
        }
        return $data;
    }

    /**
     * @return UserPresence[]
     */
    public function getList(): array
    {
        return $this->list;
    }


}
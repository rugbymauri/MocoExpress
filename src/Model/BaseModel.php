<?php

namespace App\Model;

abstract class BaseModel
{
    protected ?int $id = null;
    protected ?\DateTimeImmutable $created_at;
    protected ?\DateTimeImmutable $updated_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public static function createBaseModel(BaseModel $data, object $jsonData)
    {
        if (isset($jsonData->id)) $data->id = $jsonData->id;
        if (isset($jsonData->created_at)) $data->created_at = new \DateTimeImmutable($jsonData->created_at);
        if (isset($jsonData->updated_at)) $data->updated_at = new \DateTimeImmutable($jsonData->updated_at);
        return $data;
    }


}
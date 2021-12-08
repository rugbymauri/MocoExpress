<?php

namespace App\Model;

class User extends BaseModel
{
    protected ?string $firstname = null;
    protected ?string $lastname = null;
    protected bool $active = true;
    protected bool $extern = false;
    protected ?string $email = null;
    protected ?string $mobile_phone = null;
    protected ?string $work_phone = null;
    protected ?string $home_address = null;
    protected ?string $info = null;
    protected ?\DateTime $birthday = null;
    protected ?string $avatar_url = null;
    protected ?object $custom_properties = null;

    private function __construct()
    {
    }

    public static function create(object $jsonData): self
    {
        $data = new self();
        parent::createBaseModel($data, $jsonData);
        if (isset($jsonData->firstname)) $data->firstname = $jsonData->firstname;
        if (isset($jsonData->lastname)) $data->lastname = $jsonData->lastname;
        if (isset($jsonData->active)) $data->active = $jsonData->active;
        if (isset($jsonData->extern)) $data->extern = $jsonData->extern;
        if (isset($jsonData->email)) $data->email = $jsonData->email;
        if (isset($jsonData->mobile_phone)) $data->mobile_phone = $jsonData->mobile_phone;
        if (isset($jsonData->work_phone)) $data->work_phone = $jsonData->work_phone;
        if (isset($jsonData->info)) $data->info = $jsonData->info;
        if (isset($jsonData->birthday)) $data->birthday = new \DateTime($jsonData->birthday);
        if (isset($jsonData->avatar_url)) $data->avatar_url = $jsonData->avatar_url;
        if (isset($jsonData->custom_properties)) $data->custom_properties = $jsonData->custom_properties;

        return $data;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function isExtern(): bool
    {
        return $this->extern;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getMobilePhone(): ?string
    {
        return $this->mobile_phone;
    }

    public function getWorkPhone(): ?string
    {
        return $this->work_phone;
    }

    public function getHomeAddress(): ?string
    {
        return $this->home_address;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function getBirthday(): ?\DateTime
    {
        return $this->birthday;
    }

    public function getAvatarUrl(): ?string
    {
        return $this->avatar_url;
    }

    public function getCustomProperties(): ?object
    {
        return $this->custom_properties;
    }


}
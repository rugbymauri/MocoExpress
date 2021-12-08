<?php

namespace App\Model;

class UserPresence extends BaseModel
{
    protected ?\DateTime $date = null;
    protected ?string $from = '';
    protected ?string $to = '';
    protected bool $is_home_office = false;
    protected ?User $user = null;

    public static function create(object $jsonData): self
    {
        $data = new self();
        parent::createBaseModel($data, $jsonData);
        if (isset($jsonData->date)) $data->date = new \DateTime($jsonData->date);
        if (isset($jsonData->from)) $data->from = $jsonData->from;
        if (isset($jsonData->from)) $data->to = $jsonData->to;
        if (isset($jsonData->is_home_office)) $data->is_home_office = $jsonData->is_home_office;

        if (isset($jsonData->user)) $data->user = User::create($jsonData->user);

        return $data;
    }

    /**
     * @return \DateTime|null
     */
    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    /**
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }

    /**
     * @return string|null
     */
    public function getTo(): string
    {
        return $this->to ?: '';
    }

    /**
     * @return bool
     */
    public function isHomeOffice(): bool
    {
        return $this->is_home_office;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setDate(?\DateTime $date): UserPresence
    {
        $this->date = $date;
        return $this;
    }

    public function setFrom(?string $from): UserPresence
    {
        $this->from = $from;
        return $this;
    }

    public function setTo(?string $to): UserPresence
    {
        $this->to = $to;
        return $this;
    }

    public function setIsHomeOffice(bool $is_home_office): UserPresence
    {
        $this->is_home_office = $is_home_office;
        return $this;
    }


}
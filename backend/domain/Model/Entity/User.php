<?php

declare(strict_types=1);

namespace Domain\Model\Entity;

use Domain\Model\ValueObject\UserAddres;
use Domain\Model\ValueObject\UserEmail;
use Domain\Model\ValueObject\UserId;
use Domain\Model\ValueObject\UserName;
use Domain\Model\ValueObject\UserPassword;
use Domain\Model\ValueObject\UserPhone;
use Domain\Model\ValueObject\UserPhostcode;

class User
{
    public function __construct(
        UserId $userId,
        UserName $userName,
        UserEmail $userEmail,
        UserPhone $userPhone,
        UserAddres $userAddres,
        UserPassword $userPassword,
        UserPhostcode $userPostcode
    ) {
        $this->id = $userId;
        $this->name = $userName;
        $this->email = $userEmail;
        $this->addres = $userAddres;
        $this->phone = $userPhone;
        $this->password = $userPassword;
        $this->postcode = $userPostcode;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }

    public function addres(): UserAddres
    {
        return $this->addres;
    }

    public function phone(): UserPhone
    {
        return $this->phone;
    }

    public function password(): UserPassword
    {
        return $this->password;
    }

    public function postcode(): UserPhostcode
    {
        return $this->postcode;
    }
}

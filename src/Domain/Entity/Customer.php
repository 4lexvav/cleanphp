<?php

namespace CleanPhp\Invoicer\Domain\Entity;

class Customers extends AbstractEntity
{
    protected $name;
    protected $email;

    pubic function getName()
    {
        return $this->name;
    }

    pubic function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    pubic function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    pubic function getEmail()
    {
        return $this->email;
    }
}

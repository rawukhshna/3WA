<?php

class Etudiant
{

    private int $age;
    private string $firstName;
    private string $lastName;

    public function __construct(int $age, string $firstName, string $lastName)
    {
        $this->age = $age;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getAge(): int
    {
        return $this->age;
    }
    public function setAge(int $age)
    {
        if ($age > 70 || $age < 18) {
            throw new Exception("L'âge doit être un entier entre 18 et 70 ans !");
        }

        $this->age = $age;
    }
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    public function setFirstName(string $firstName)
    {
        $this->firstName = strtoupper($firstName);
    }
    public function getLastName(): string
    {
        return $this->lastName;
    }
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }
}

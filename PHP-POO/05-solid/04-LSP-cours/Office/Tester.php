<?php

namespace Office;

class Tester extends Employee
{
    public function work(): string
    {
        return "test1 => success, test2 => failure";
    }
}

<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Person;
use PHPUnit\Framework\Attributes\Test;


class PersonTest extends TestCase
{
    public function testGetFullNamesIsFirstNameAndSurname(): void
    {
        $person = new Person();

        $person->setSurname("Test");
        $person->setName("Tester Name");

        $this->assertSame("Tester Name Test", $person->getFullName());
    }

    #[Test]
    public function full_name_is_first_name_when_no_surname(): void
    {
        $person = new Person();

        $person->setName("Test");
        $this->assertSame("Test", $person->getFullName());
    }
}
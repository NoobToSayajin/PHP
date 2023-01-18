<?php

namespace Alt;

class Student extends Humain
{
    public function __construct(string $name, int $age)
    {
        parent::__construct($name, $age);
    }

    public function __toString(): string
    {
        return "Nom: $this->name, age: $this->age, planète: " . self::$planet . ".<br>";
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name . ' student';
    }
}

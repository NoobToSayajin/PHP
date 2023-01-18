<?php

namespace TestClass;

abstract class Humain
{
    static string $planet = 'Terre';

    public function __construct(
        protected string $name,
        protected int $age = 0
    ) {
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): self
    {
        if (gettype($name) === 'string') {
            $this->name = $name;
        }

        return $this;
    }

    /**
     * Get the value of age
     *
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @param int $age
     *
     * @return self
     */
    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of planet
     *
     * @return $planet
     */
    public static function getPlanet(): string
    {
        return self::$planet;
    }

    /**
     * Set the value of planet
     *
     * @param $planet $planet
     */
    public static function setPlanet(string $planet)
    {
        self::$planet = $planet;
    }
}

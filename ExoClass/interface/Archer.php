<?php

use interfacePerso;

require_once 'interfacePerso.php';

class Archer implements interfacePerso
{
    public function setnom(string $nom): self
    {
        $nom = "je suis l'archer toto";
        return $this;
    }

    public function setAge(int $age): self
    {

        return $this;
    }
}

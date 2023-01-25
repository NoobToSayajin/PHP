<?php

use interfacePerso;

require_once 'interfacePerso.php';

class Guerier implements interfacePerso
{
    public function setnom(string $nom): self
    {
        $nom="je suis le gayrieur toto";
        return $this;
    }

    public function setAge(int $age): self
    {

        return $this;
    }
}

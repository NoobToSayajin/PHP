<?php

interface interfacePerso{
    //je list les methodes qui devront être implémenter dans les classe qui implementeront l'interface
    public function setNom(string $nom): self;
    public function setAge(int $age): self;
}

class Foo {}   //pour creer un type de return
class Bar extends Foo {}

interface A {
    public function myfunc(Foo $arg): Foo;
}

interface B {
    public function myfunc(Bar $arg): Bar; //fonction identique à A mais type different
}

class MyClass implements A, B
{
    public function myfunc(Foo $arg): Bar //permet de creer un polymorphism
    {
        return new Bar();
    }
}
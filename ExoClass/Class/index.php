<?php

//https://github.com/smknstd/modern-php-cheatsheet class version php 8

namespace TestClass;

require_once 'Humain.php';
require_once 'Student.php';
require_once './../Alt/Humain.php';
require_once './../Alt/Student.php';

// use Alt\Student as StudAlt;
use Alt\Student as StudAlt;
use TestClass\Student;

$Alex = new  Student('Alex', 25);
$Tom = new  Student('Tom', 32);
echo $Alex;
echo '<hr>';
echo $Tom;
echo '<hr>';
$Alex->setAge(18);
echo $Alex;
echo '<hr>';
Student::setPlanet('Mars');
echo $Alex;
echo '<hr>';
echo $Tom->getName();


$hum1 = new StudAlt('Jean-Phillipe Herbien', 123);
echo $hum1 . '<hr>';

unset($hum1);

$humAlt = new StudAlt('Octave Hergebel', 456);
echo $humAlt . '<hr>';

<?php

echo "its a trap<hr>";
require_once __DIR__ . '\lib\Ship.php';
// require_once 'C:\xampp\htdocs\DrupalizeMe\OOPS\1\start\lib\Ship.php';

// class Ship
// {
//     public $name;
//     public $weaponPower = 0;
//     public $jediFactor = 0;
//     public $strength = 0;

//     // public function sayHello()
//     // {
//     //     echo "HELLO";
//     // }
//     public function getName()
//     {
//         // return "Fake Name";
//         return $this->name;
//     }
//     public function getNameAndSpecs($useShortFormat)
//     {

//         if ($useShortFormat) {
//             return sprintf(
//                 '%s: %s , %s , %s',
//                 $this->name,
//                 $this->weaponPower,
//                 $this->jediFactor,
//                 $this->strength
//             );
//         }
//         return sprintf(
//             '%s: w:%s , j:%s , s:%s',
//             $this->name,
//             $this->weaponPower,
//             $this->jediFactor,
//             $this->strength
//         );
//     }
//     public function doesGivenShipHaveMoreStrength($givenShip)
//     {

//         return ($givenShip->strength) > ($this->strength);

//     }
// }

/**
 * Summary of printShipSummary
 * @param Ship $someShip
 * @return void
 */
function printShipSummary(Ship $someShip)
{
    echo 'Ship Name : ' . $someShip->name;
    echo $someShip->getNameAndSpecs(true);
    echo "<hr>";
}
$myShip = new Ship();
$myShip->name = "Jedi StartShip";
$myShip->weaponPower = 10;
$myShip->strength = 500;

$otherShip = new Ship();
$otherShip->name = "Imperial Shuttle";
$otherShip->weaponPower = 5;
$otherShip->strength = 21;

printShipSummary($myShip);
printShipSummary($otherShip);

if ($myShip->doesGivenShipHaveMoreStrength($otherShip)) {
    echo $otherShip->name . " has more strength " . $otherShip->strength;
} else {
    echo $myShip->name . " has more strength " . $myShip->strength;
}

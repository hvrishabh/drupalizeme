<?php

require_once __DIR__ . '\lib\Ship.php';

function get_ships()
{
    $ships = array();

    $ship = new Ship("Jedi StarFighter");
    // $ship->setName("Jedi StarFighter");
    $ship->setWeaponPower(5);
    $ship->setJediFactor(16);
    $ship->setStrength(30);
    // $ship->setUnderRepair(true);
    $ships['starfighter'] = $ship;

    $ship2 = new Ship("clookShape Fighter");
    // $ship2->setName("clookShape Fighter");
    $ship2->setWeaponPower(10);
    $ship2->setJediFactor(17);
    $ship2->setStrength(20);
    // $ship2->setUnderRepair(true);
    $ships['ClookShape_Fighter'] = $ship2;

    $ship3 = new Ship("hawwHAHAHA Fighter");
    // $ship3->setName("hawwHAHAHA Fighter");
    $ship3->setWeaponPower(102);
    $ship3->setJediFactor(172);
    $ship3->setStrength(202);
    // $ship3->setUnderRepair(true);
    $ships['hawwHAHAHA_Fighter'] = $ship3;

    // echo "<pre>";
    // print_r($ships);
    // echo "</pre>";

    return $ships;
}

/**
 * Our complex fighting algorithm!
 *
 * @return array With keys winning_ship, losing_ship & used_jedi_powers
 */
function battle(Ship $ship1, $ship1Quantity, Ship $ship2, $ship2Quantity)
{
    $ship1Health = $ship1->getStrength() * $ship1Quantity;
    print_r($ship1Health);
    $ship2Health = $ship2->getStrength() * $ship2Quantity;

    $ship1UsedJediPowers = false;
    $ship2UsedJediPowers = false;
    while ($ship1Health > 0 && $ship2Health > 0) {
        // first, see if we have a rare Jedi hero event!
        if (didJediDestroyShipUsingTheForce($ship1)) {
            $ship2Health = 0;
            $ship1UsedJediPowers = true;

            break;
        }
        if (didJediDestroyShipUsingTheForce($ship2)) {
            $ship1Health = 0;
            $ship2UsedJediPowers = true;

            break;
        }

        // now battle them normally
        $ship1Health = $ship1Health - ($ship2->getWeaponPower() * $ship2Quantity);
        $ship2Health = $ship2Health - ($ship1->getWeaponPower() * $ship1Quantity);
    }

    if ($ship1Health <= 0 && $ship2Health <= 0) {
        // they destroyed each other
        $winningShip = null;
        $losingShip = null;
        $usedJediPowers = $ship1UsedJediPowers || $ship2UsedJediPowers;
    } elseif ($ship1Health <= 0) {
        $winningShip = $ship2;
        $losingShip = $ship1;
        $usedJediPowers = $ship2UsedJediPowers;
    } else {
        $winningShip = $ship1;
        $losingShip = $ship2;
        $usedJediPowers = $ship1UsedJediPowers;
    }

    return array(
        'winning_ship' => $winningShip,
        'losing_ship' => $losingShip,
        'used_jedi_powers' => $usedJediPowers,
    );
}

function didJediDestroyShipUsingTheForce(Ship $ship)
{
    $jediHeroProbability = $ship->getJediFactor() / 100;

    return mt_rand(1, 100) <= ($jediHeroProbability * 100);
}

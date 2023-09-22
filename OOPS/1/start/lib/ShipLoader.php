<?Php

class ShipLoader
{
    public function getShips()
    {

        $shipsData = $this->queryForShips();
        // var_dump($shipsArray);
        $ships = array();

        // foreach ($shipsData as $shipData) {
        //     // echo "<pre>";
        //     // print_r($shipData);
        //     // echo "</pre>";
        //     $ship = new Ship($shipData['name']);
        //     foreach ($shipData as $key => $value) {
        //         echo "$key : $value <br>";

        //         switch ($key) {
        //             case "name":
        //                 $ship->setName($value);
        //                 continue 2;
        //             case "weapon_power":
        //                 $ship->setWeaponPower($value);
        //                 continue 2;
        //             case "jedi_factor":
        //                 $ship->setJediFactor($value);
        //                 continue 2;
        //             case "strength":
        //                 $ship->setStrength($value);
        //                 continue 2;
        //         }
        //     }
        //     $ships[] = $ship;

        // }

        foreach ($shipsData as $shipData) {
            $ship = new Ship($shipData['name']);
            $ship->setWeaponPower($shipData['weapon_power']);
            $ship->setJediFactor($shipData['jedi_factor']);
            $ship->setStrength($shipData['strength']);

            $ships[] = $ship;
        }

        // $ship = new Ship("Jedi StarFighter");
        // $ship->setName("Jedi StarFighter");
        // $ship->setWeaponPower(5);
        // $ship->setJediFactor(16);
        // $ship->setStrength(30);
        // // $ship->setUnderRepair(true);
        // $ships['starfighter'] = $ship;

        // $ship2 = new Ship("clookShape Fighter");
        // // $ship2->setName("clookShape Fighter");
        // $ship2->setWeaponPower(10);
        // $ship2->setJediFactor(17);
        // $ship2->setStrength(20);
        // // $ship2->setUnderRepair(true);
        // $ships['ClookShape_Fighter'] = $ship2;

        // $ship3 = new Ship("hawwHAHAHA Fighter");
        // // $ship3->setName("hawwHAHAHA Fighter");
        // $ship3->setWeaponPower(102);
        // $ship3->setJediFactor(172);
        // $ship3->setStrength(202);
        // // $ship3->setUnderRepair(true);
        // $ships['hawwHAHAHA_Fighter'] = $ship3;

        // echo "<pre>";
        // print_r($ships);
        // echo "</pre>";

        return $ships;
    }
    private function queryForShips()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=oo_battle', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $pdo->prepare('SELECT * FROM ship');
        $statement->execute();
        $shipArray = $statement->fetchAll(PDO::FETCH_ASSOC);
        // echo "<pre>";
        // print_r($shipArray);
        // echo "</pre>";
        return $shipArray;
    }
}

// foreach ($ships as $key => $ship) {
//     echo "The $key is $ship";
//     echo "<br>";

//     $ship->setWeaponPower(['weapon_power']);
//     $ship->setJediFactor('jedi_factor ');
//     $ship->setStrength('strength ');
// }
// $ships['id'] = $ship;

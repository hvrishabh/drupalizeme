<?Php

/**
 * Summary of ShipLoader
 * @return Ship[];
 */
class ShipLoader
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
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
            $ships[] = $this->createShipFromData($shipData);
        }
        return $ships;
    }

    public function findOneById($id)
    {
        $pdo = $this->getPDO();

        $statement = $pdo->prepare('SELECT * FROM ship WHERE id = :id');
        $statement->execute(array('id' => $id));
        $shipArray = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$shipArray) {
            return null;
        }
        return $this->createShipFromData($shipArray);
        // echo "<pre>";
        // print_r($shipArray);
        // echo "</pre>";
    }

    private function createShipFromData(array $shipData)
    {
        $ship = new Ship($shipData['name']);
        $ship->setId($shipData['id']);
        $ship->setWeaponPower($shipData['weapon_power']);
        $ship->setJediFactor($shipData['jedi_factor']);
        $ship->setStrength($shipData['strength']);

        return $ship;
    }
    private function queryForShips()
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM ship');
        $statement->execute();
        $shipArray = $statement->fetchAll(PDO::FETCH_ASSOC);
        // echo "<pre>";
        // print_r($shipArray);
        // echo "</pre>";
        return $shipArray;
    }

    /**
     * Summary of getPDO
     * @return PDO
     */
    private function getPDO()
    {

        // if ($this->pdo == null) {
        //     $pdo = new PDO($this->dbDsn,$this->dbUser,$this->dbPass);
        //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //     $this->pdo = $pdo;
        // }

        return $this->pdo;
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

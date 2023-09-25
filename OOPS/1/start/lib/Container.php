<?php

class Container
{
    private $configuration;
    private $pdo;
    private $shipLoader;
    private $battleManager;

    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }
    /**
     * Summary of getPDO
     * @return PDO
     */
    public function getPDO()
    {

        if ($this->pdo === null) {
            $this->pdo = new PDO(
                $this->configuration['db_dsn'],
                $this->configuration['db_user'],
                $this->configuration['db_pass']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
        // $configuration = array(
        //     'db_dsn' => 'mysql:host=localhost;dbname=oo_battle',
        //     'db_user' => 'root',
        //     'db_pass' => '',
        // );

    }

    public function getShipLoader()
    {
        if ($this->shipLoader === null) {
            $this->shipLoader = new ShipLoader($this->getPDO());

        }
        return $this->shipLoader;
    }

    public function getBattleManager()
    {
        if ($this->battleManager === null) {
            $this->battleManager = new BattleManager($this->getPDO());

        }
        return $this->battleManager;
    }

}

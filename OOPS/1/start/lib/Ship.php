<?php



class Ship
{
    private $name;
    private $weaponPower;
    private $jediFactor;
    private $strength = 0;

    // public function getName()
    // {
    //     // return "Fake Name";
    //     return $this->name;
    // }
    public function getNameAndSpecs($useShortFormat = false )
    {

        if ($useShortFormat) {
            return sprintf(
                '%s: %s , %s , %s',
                $this->name,
                $this->weaponPower,
                $this->jediFactor,
                $this->strength
            );
        }
        return sprintf(
            '%s: w:%s , j:%s , s:%s',
            $this->name,
            $this->weaponPower,
            $this->jediFactor,
            $this->strength
        );
    }
    public function doesGivenShipHaveMoreStrength($givenShip)
    {

        return ($givenShip->strength) > ($this->strength);

    }

    public function setStrength($strength){

        if(is_numeric($strength)){
            $this->strength = $strength;
        }else{
            throw new Exception("Invalid number . " .$strength);
        }

    }

    public function getStrength(){
        return $this->strength;
    }


	/**
	 * @return mixed
	 */
	public function getJediFactor() {
		return $this->jediFactor;
	}

	/**
	 * @param mixed $jediFactor
	 * @return self
	 */
	public function setJediFactor($jediFactor): self {
		$this->jediFactor = $jediFactor;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getWeaponPower() {
		return $this->weaponPower;
	}

	/**
	 * @param mixed $weaponPower
	 * @return self
	 */
	public function setWeaponPower($weaponPower): self {
		$this->weaponPower = $weaponPower;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getName() {
		return ($this->name);
		// return strtoupper($this->name);
	}

	/**
	 * @param mixed $name
	 * @return self
	 */
	public function setName($name): self {
		$this->name = $name;
		return $this;
	}
}

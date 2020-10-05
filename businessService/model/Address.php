<?php

class Address {
    
    private $id;
    private $addresstype;
    private $isdefault;
    private $user_id;
    private $street;
    private $city;
    private $state;
    private $postalcode;
    
    public function __construct($id, $addresstype, $isdefault, $user_id, $street, $city, $state, $postalcode){
        $this->id = $id;
        $this->addresstype = $addresstype;
        $this->isdefault = $isdefault;
        $this->user_id = $user_id;
        $this->street = $street;
        $this->city = $city;
        $this->state = $state;
        $this->postalcode = $postalcode;
    }
    
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAddresstype()
    {
        return $this->addresstype;
    }

    /**
     * @return mixed
     */
    public function getIsdefault()
    {
        return $this->isdefault;
    }

    /**
     * @return mixed
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return mixed
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $addresstype
     */
    public function setAddresstype($addresstype)
    {
        $this->addresstype = $addresstype;
    }

    /**
     * @param mixed $isdefault
     */
    public function setIsdefault($isdefault)
    {
        $this->isdefault = $isdefault;
    }

    /**
     * @param mixed $user_id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @param mixed $postalcode
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;
    }

    
}

?>
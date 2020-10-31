<?php

class Order {
    private $id; 
    private $date;
    private $user_id;
    private $cc;
    private $total;

    public function __construct($id, $date, $user_id, $cc, $total) {
        $this->id = $id;
        $this->date = $date;
        $this->user_id = $user_id;
        $this->cc = $cc;
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getUser_Id()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user
     *
     * @return self
     */
    public function setUser_Id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * @param mixed $cc
     *
     * @return self
     */
    public function setCc($cc)
    {
        $this->cc = $cc;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     *
     * @return self
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }
}

}
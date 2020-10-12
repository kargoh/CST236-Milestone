<?php 

class Cart {

    private $userid; // the owner of the cart
    private $items = array();
    private $subtotals = array();
    private $total_price;

    function __construct($userid) {
        $this->userid = $userid;
        $this->items = array();
        $this->subtotals = array();
        $this->total_price = 0;
    }

    function addItem($prod_id) {

        if (array_key_exists($prod_id, $this->items)){
            $this->items[$prod_id] += 1;
        } else {
            $this->items = $this->items + array($prod_id => 1);
        }
    }

    function updateQty($prod_id, $newqty) {
        if (array_key_exists($prod_id, $this->items)){
            $this->items[$prod_id] = $newqty;
        } else {
            $this->items = $this->items + array($prod_id => $newqty);
        }

        if ($this->items[$prod_id] == 0) {
            unset($this->items[$prod_id]);
        }
    }

    function calculateTotal() {
        // calculate the subtotal for each product in the cart
        // calculate the total for the entire cart

        $productBS = new ProductBusinessService();

        $subtotals_array = array();
        $this->total_price = 0;

        foreach($this->items as $item => $qty) {
            $product = $productBS->findbyID($item);
            $product_subtotal = $product->getPrice() * $qty;
            $subtotals_array = $subtotals_array + array($item => $product_subtotal);
            $this->total_price = $this->total_price + $product_subtotal;
        }


        $this->subtotals = $subtotals_array;
    }


    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @return multitype:
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return multitype:
     */
    public function getSubtotals()
    {
        return $this->subtotals;
    }

    /**
     * @return mixed
     */
    public function getTotal_price()
    {
        return $this->total_price;
    }

    /**
     * @param mixed $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @param multitype: $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @param multitype: $subtotals
     */
    public function setSubtotals($subtotals)
    {
        $this->subtotals = $subtotals;
    }

    /**
     * @param mixed $total_price
     */
    public function setTotal_price($total_price)
    {
        $this->total_price = $total_price;
    }
 
    
}

?>
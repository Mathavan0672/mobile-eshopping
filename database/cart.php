<?php
// ADD ITEM TO CART

class Cart{

    public $db = null;

    public function __construct(DBController $db)
    {
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    // INSERT INTO CART TABLE
    public function insertItemIntoCart($params=null, $cart='cart'){
        If($this->db->con != null){
            if($params != null){
                // INSERT ITEM-ID ITEM-VALUE IN CART TABLE
                $keyvalues = implode(',' , array_keys($params));

                // TO TEST
                // print_r(($keyvalues));

                $values = implode(',' , array_values($params));

                // TO TEST
                // print_r(($values));

                // CREATE QUERY STATEMENT
                $query_sring = sprintf('INSERT INTO %s(%s) VALUES(%s)',$cart, $keyvalues, $values);

                 // TO TEST
                // echo $query_sring;

                // EXECUTE QUERY
                $result = $this->db->con->query($query_sring);
                return $result;

            }
        }
    }

    // GET USER INFO INSERT INTO CART TABLE 
    public function addToCart($userId, $itemId){
        if(isset($userId) && isset($itemId)){
            $params = array(
                "user_id" => $userId,
                "item_id" => $itemId
            );
             $result = $this->insertItemIntoCart($params);
        if($result){

            header('Location:' . $_SERVER['PHP_SELF']);
        }

        }
    }

    // DELETE RECORD BY ITEM ID
    public function deleteCartItem($item_id = null, $table = 'cart'){

        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id = $item_id");

            if($result){
                header('Location:' . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
    // DELETE RECORD BY ITEM ID WISHLIST
    public function deleteWishlistItem($item_id = null, $table = 'wishlist'){

        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id = $item_id");

            if($result){
                header('Location:' . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // INSERT SELECT DELETE WISHLIST
    public function saveForLater($item_id = null, $saveTable = 'wishlist', $fromTable = 'cart'){
        if($item_id != null){
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
            $query.= "DELETE FROM {$fromTable} WHERE item_id = {$item_id};";

            $result = $this->db->con->multi_query($query);

            if($result){

                header('Location:' . $_SERVER['PHP_SELF']);
            }

            return $result;
        }

    }

    // GET PRODUCT SUBTOTAL
    public function getSumTotal($arrSum){
        if(isset($arrSum)){
            $sum = 0;
            foreach($arrSum as $itemSum){
                $sum += floatval($itemSum[0]);
            }
            return sprintf('%.2f', $sum);
        }

    }

    // GET ITEM ID FROM SHOPPING CART LIST
    public function getCartId($cartArray = null, $key = 'item_id'){
        if($cartArray != null){
           $cart_id =  array_map(function($value) use ($key){
                return $value [$key];
            },$cartArray);
            
            return $cart_id;
        }
    }
};
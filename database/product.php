<?php
// FETCH PRODUCT DATA 

class Product{
    
    public $db = null;

     public function __construct(DBController $db)
    {
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    // GET DATA FROM PRODUCT TABLE
public function getData($table = 'product'){
     
   $result = $this->db->con->query("SELECT * FROM {$table}");

    $resultArray = array();

    // GET DATA PRODUCT ONE BY ONE
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
         $resultArray[] = $row;
    }
        return $resultArray;
   
   }

    // GET DATA FROM PRODUCT TABLE BY ITEM_ID
public function getProduct($item_id = null, $table = 'product'){

     if(isset($item_id)){
          
           $result = $this->db->con->query("SELECT * FROM {$table} WHERE item_id={$item_id}");
     }

      $resultArray = array();

     // GET DATA PRODUCT ONE BY ONE
     while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          $resultArray[] = $row;
     }
          return $resultArray;
     
     }
};
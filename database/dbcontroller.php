<?php
class DBController {
    // DBCONTROLLER CONNECTION PROPERTIES
    protected $host = "eu-cdbr-west-03.cleardb.net";
    protected $user = "be7cccb462b34c";
    protected $passwd = "4c4f8692";
    protected $dbname = "heroku_bdb575f979e51b3";

    // CONNECTION PROPERTY
    public $con = null;

    // CALL CONSTRUCTOR
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->passwd, $this->dbname);
        if($this->con->connect_error){
            echo "Fail to connect" .$this->con->connect_error;
        }

        // echo "Connection Sucessfull";
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    // CLOSE MYSQL CONNECTION
    protected function closeConnection(){
       if($this->con != null){
        $this->con->close();
        $this->con = null;
       }
    }

}

// DBCONTROLLER OBJECT(test)
// $db = new DBController;
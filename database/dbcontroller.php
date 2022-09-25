<?php
class DBController {
    // DBCONTROLLER CONNECTION PROPERTIES
    protected $host = "eu-cdbr-west-03.cleardb.net";
    protected $user = "be416c17c1f4cd";
    protected $passwd = "890de491";
    protected $dbname = "heroku_0f90de888376e21";

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
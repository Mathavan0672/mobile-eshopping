<?php

class Register {

    public $db = null;

    public function __construct(DBController $db){
          if(!isset($db->con)) return null;
           $this->db = $db; 
    
}
    // REGISTER NEW USER
    public function registerUser($firstname, $lastname, $email, $password, $confirm_passwd, $profileImage){
        // Error Message 
        $error = array();

        $firstname = validate_input_text($_POST['firstname']);
        if(empty($firstname)){
            $error[]="Plese Enter Firstname";
        }

        $lastname = validate_input_text($_POST['lastname']);
        if(empty($lastname)){
            $error[]="Plese Enter Lastname";
        }

        $email = validate_input_email($_POST['email']);
        if(empty($email)){
            $error[]="Plese Enter Email";
        }

        $password = validate_input_text($_POST['password']);
        if(empty($password)){
            $error[]="Plese Enter Password";
        }

        $confirm_passwd = validate_input_text($_POST['confirm_passwd']);
        if(empty($confirm_passwd)){
            $error[]="Plese Enter Confirm_Password";
        }

        $files = $_FILES['profileupload'];
        $profileImage = upload_profile("./assets/profile/" , $files);


        if(empty($error)){
            
        //REGISTER NEW USER
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        //    require("mysql_connect.php");
        
        //MAKE A QUERY
        $query = "INSERT INTO register_user( firstName, lastName, email, passWord, profileImage, registerDate)";  
        $query.= "VALUES(?,?,?,?,?, NOW())";

        //INITIALIZE THE STATEMENT
        $q = mysqli_stmt_init($this->db->con);
        //PREPARE SQL STATEMENT
        mysqli_stmt_prepare($q, $query);
        //BIND VALUES
        mysqli_stmt_bind_param($q, 'sssss', $firstname, $lastname, $email, $hashed_password, $profileImage);
        // EXECUTE STATEMENT
        mysqli_stmt_execute($q);

        if(mysqli_stmt_affected_rows($q) == 1){
            //START NEW SESSION
            session_start();
            //CRAETE SESSION VARIABLE
            $_SESSION['userID'] = mysqli_insert_id($this->db->con);
                header('Location:login.php');
                 // print "Record Inserted Successfully...!";
                    }else {

                        print "Record Not Created!!!";
                    }


                    }
                    else{
                        echo "Not Validate";
                    }

                    }
        

    // TO GET USER INFO
    public function get_user_info($userID){

            //MAKE A QUERY
            $query = "SELECT userID, firstName, lastName, email, profileImage FROM register_user WHERE userID=?;";

            //INITIALIZE STATEMENT
            $q = mysqli_stmt_init($this->db->con);

            // PREPARE STATEMENT
            mysqli_stmt_prepare($q, $query);

            //BIND PARAMS
            mysqli_stmt_bind_param($q, 'i' , $userID);

            //EXECUTE STATEMENT
            mysqli_stmt_execute($q);

            //GET RESULT
            $result = mysqli_stmt_get_result($q);

            //FETCH ARRAY
            $row = mysqli_fetch_array($result);

            // if(empty($row)){

            //     return false ;
            // }else {
                
            //     return $row;
            // }

            return empty($row) ? false : $row ;
        }

    // TO GET LOGIN USER INFO
    public function loginUser($email, $password){
        // Error Message
        $error = array();

        $email = validate_input_email($_POST['email']);
        if(empty($email)){
        $error[]="Plese Enter Email";
        }

        $password = validate_input_text($_POST['password']);
        if(empty($password)){
        $error[]="Plese Enter Password";
        }

        if(empty($error)){
        //MAKE A QUERY
        $query = "SELECT userID, firstName, lastName, email, passWord, profileImage, registerDate FROM register_user WHERE
        email=?";
        //INITIALIZE THE STATEMENT
        $q = mysqli_stmt_init($this->db->con);
        //PREPARE SQL STATEMENT
        mysqli_stmt_prepare($q, $query);
        //BIND VALUES
        mysqli_stmt_bind_param($q, 's', $email);
        // EXECUTE STATEMENT
        mysqli_stmt_execute($q);

        $result = mysqli_stmt_get_result($q);

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if(!empty($row)){
            //VERIFY PASSWORD
              if(password_verify($password, $row['passWord'])){
                //CRAETE SESSION VARIABLE
                $_SESSION['userID'] = $row['userID'];
                header('Location:index.php');
                } else {
                    print "Wrong Password!!!";
                }
            } else {

                print "Error...Not Valid info!!!";
            }
            }
            }

    // GET USER FROM REGISTER USET TABLE BY USER_ID
    public function getUser($user_id = null, $table = 'register_user'){

     if(isset($user_id)){
          
           $result = $this->db->con->query("SELECT * FROM {$table} WHERE userID={$user_id}");
     }

      $resultArray = array();

     // GET DATA PRODUCT ONE BY ONE
     while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          $resultArray[] = $row;
     }
          return $resultArray;
     
     }

}
<?php

//SANITIZE INPUT
function validate_input_text($textvalue){

    if(!empty($textvalue)){

        $trim_text=trim($textvalue);

        // REMOVE ILLEGAL CHARACTER
        $sanitize_str = filter_var($trim_text.FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        return $sanitize_str;
    }

    return "";
    
}

//SANITIZE EMAIL
function validate_input_email($emailvalue){

    if(!empty($emailvalue)){

        $trim_email=trim($emailvalue);

        // REMOVE ILLEGAL CHARACTER
        $sanitie_email = filter_var($trim_email.FILTER_SANITIZE_EMAIL);
        return $sanitie_email;
    }

    return "";
    
}

//UPLOAD PROFILE IMAGE
function upload_profile($path, $filename){

    // $targetDir = "./assets/profile";
    $targetDir = $path;
    $default = "beard.jpg";

    // GET THE FILENAME
    $file = basename($filename['name']);
    $targetFilePath = $targetDir.$file;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if(!empty($file)){

        //ALLOW CERTAIN FILE TYPE
        $allowType = array('jpg', 'jpeg', 'png', 'gif', 'pdf');

        if(in_array($fileType, $allowType)){

            // UPLOAD FILE TO THE SERVER
            if(move_uploaded_file($filename['tmp_name'], $targetFilePath)){
                return $targetFilePath;
            }
        }

    }

    // RETURN DEFAULT IMAGE;
    return $path.$default;
    // return "./assets/profile/".$default;


}

// // TO GET USER INFO
// function get_user_info($con, $userID){

//     //MAKE A QUERY
//     $query = "SELECT  firstName, lastName, email, profileImage FROM register_user WHERE userID=?";

//     //INITIALIZE STATEMENT
//     $q = mysqli_stmt_init($con);

//     // PREPARE STATEMENT
//     mysqli_stmt_prepare($q, $query);

//     //BIND PARAMS
//     mysqli_stmt_bind_param($q, 'i' , $userID);

//     //EXECUTE STATEMENT
//     mysqli_stmt_execute($q);

//     //GET RESULT
//     $result = mysqli_stmt_get_result($q);

//     //FETCH ARRAY
//     $row = mysqli_fetch_array($result);

//     // if(empty($row)){

//     //     return false ;
//     // }else {
        
//     //     return $row;
//     // }

//     return empty($row) ? false : $row ;
// }
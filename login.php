<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How To Register</title>

    <!-- Bootstrap only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- CSS only -->
    <link rel="stylesheet" href="./Style/main.css">

    <?php
    require('./functions.php');
    require('./helper.php');
    ?>

</head>

<?php
session_start();
        $user = array();
            // require('mysql_connect.php');
            if(isset($_SESSION['userID'])){
                    // GET INFO FROM SERVER
                    $user = $register->get_user_info($_SESSION['userID'] );
                }
                //SENT INFO TO SERVER
                if($_SERVER['REQUEST_METHOD'] == "POST")
                     if(isset($_POST['login_submit'])){
                         $register->loginUser($_POST['email'], $_POST['password']);
                }
?>


<body>

    <main id="main-area">

        <!-- Login Area-->

        <section id="login-form">

            <div class="row mt-5">
                <div class="col-lg-4 offset-lg-4">

                    <div class="text-center pb-5">
                        <h1 class="login-title text-dark">Login</h1>
                        <p class="p-1 m-0 font-ubuntu text-black-50">Login and Enjoy Additional Features</p>
                        <span class="font-ubuntu text-black-50">Please Register <a href="register.php"
                                title="register">Register</a></span>
                    </div>

                    <div class="upload-profile-image d-flex justify-content-center pb-5">
                        <div class="text-center">
                            <img src="<?php echo isset($user['profileImage']) ? ($user['profileImage']):'./assets/profile/beard.jpg' ?>"
                                style="width:100px; height:150px;" class="img rounded-circle" alt="default-profile">
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">

                        <form action="login.php" method="post" enctype="multipart/form-data" id="log-form">
                            <div class="form-row my-4">
                                <div class="col">

                                    <input type="email" required name="email" id="email" placeholder="Email*"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="form-row my-4">
                                <div class="col">
                                    <input type="password" required name="password" id="password"
                                        placeholder="Password*" class="form-control">
                                </div>
                            </div>

                            <div class="submit-btn text-center my-5">
                                <button type="submit" name="login_submit"
                                    class="btn btn-warning rounded-pill text-dark px-5" title="login">login</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

        </section>

        <!-- #Login Area-->

    </main>


    <!--Bootstrap Jawascript-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>

    <!--Js-->
    <script src="./js/master.js"></script>
</body>

</html>
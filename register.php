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
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            if(isset($_POST['register_submit'])){

                $register->registerUser($_POST['firstname'],$_POST['lastname'],
                $_POST['email'],$_POST['password'],$_POST['confirm_passwd'], $_FILES['profileupload']);
            }
?>


<main id="main-area">

    <!-- Register Area-->
    <section id="register">

        <div class="row m-0">
            <div class="col-lg-4 offset-lg-4">

                <div class="text-center pb-5">
                    <h1 class="login-title text-dark">Register</h1>
                    <p class="p-1 m-0 font-ubuntu text-black-50">Register and Enjoy Additional Features</p>
                    <span class="font-ubuntu text-black-50">I Already Have <a href="login.php"
                            title="login">Login</a></span>
                </div>

                <div class="upload-profile-image d-flex justify-content-center pb-5">
                    <div class="text-center">

                        <div class="d-flex justify-content-center">
                            <img class="camera-icon img rounded-circle" src="./assets/profile/camera.jpg" alt="camera">
                        </div>

                        <img src="./assets/profile/beard.jpg" style="width:100px; height:150px;"
                            class="img rounded-circle" alt="profile_image">

                        <small class="form-text text-black-50">Choose Image</small>

                        <input type="file" class="form-control-file" form="reg-form" name="profileupload"
                            id="uploadprofile">
                    </div>
                </div>

                <div class="d-flex justify-content-center">

                    <form action="register.php" method="post" enctype="multipart/form-data" id="reg-form">
                        <div class="form-row">

                            <div class="col">
                                <input type="text"
                                    value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']?>"
                                    name="firstname" id="firstname" placeholder="FirstName" class="form-control">
                            </div>

                            <div class="col">
                                <input type="text"
                                    value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname'] ?>"
                                    name="lastname" id="lastname" placeholder="LastName" class="form-control">
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col">
                                <input type="email" required name="email" id="email" placeholder="Email*"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col">
                                <input type="password" required name="password" id="password" placeholder="Password*"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col">
                                <input type="password" required name="confirm_passwd" id="confirm_passwd"
                                    placeholder="Confirm Password*" class="form-control">
                                <small id="confirm_error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-inline" name="agreement" required>
                            <label for="agreement" class="form-check-label font-ubuntu text-black-50"> I agreed <a
                                    href="#">terms, condtions and policy</a>(*)</label>
                        </div>

                        <div class="submit-btn text-center my-5">
                            <button type="submit" name="register_submit"
                                class="btn btn-warning rounded-pill text-dark px-5">Continue</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>

    </section>
    <!-- #Register Area-->

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
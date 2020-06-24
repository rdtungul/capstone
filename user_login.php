<?php
    include("f_userlogin.php");
    $errorMessage = '&nbsp';

    if (isset($_POST['uname']))
        {
        $result = validateLogin();
        if ($result != ''){
        $errorMessage = $result;
    }
    }
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<!-- css codes -->
<link rel="stylesheet" type="text/css" href="css/user_login.css">


    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="img/GLogo.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form method="POST" class="form-login">

                <!-- Code for error message! -->
                <table align="center">

                <tr align="center">
                    <td><h3 class="usrlog"><?php
                            if ($errorMessage == '&nbsp')
                                echo("");
                            else
                                echo($errorMessage);
                        ?></h3></td>
                </tr>



                <span id="user_log" class="user_log"></span>
                <input type="text" name="uname" class="form-control" placeholder="Username" required autofocus>
                <div>&nbsp;</div>
                <input type="password" name="pword" class="form-control" placeholder="Password">
                <div>&nbsp;</div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Login</button>
            </form><!-- /form -->



            </table>
        </form>
        </div><!-- /card-container -->
    </div><!-- /container -->
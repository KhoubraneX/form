<?php
    if (isset($_POST["signin"]) && isset($_POST["email"]) && isset($_POST["password"])) {
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);
        $user = new User();
        $reslut = $user->getEmail($email);

        if (mysqli_num_rows($reslut) != 0) {
            $reslut_user = $user->signin($email);
            $reslut_user = mysqli_fetch_assoc($reslut_user);

            $id_user = $reslut_user["id"];
            $name_user = $reslut_user["full_name"];
            $email_user = $reslut_user["email"];
            $password_hash = $reslut_user["password"];

            if (password_verify($password , $password_hash)) {
                $_SESSION["id"] = $id_user;
                $_SESSION["auth"] = true;

                header("Location: profile.php");
            }else {
                echo '<div class="alert">
                    <span class="closebtn" onclick="this.parentElement.remove();">&times;</span> 
                    password wrong.
                </div>';
            }
        }else {
            echo '<div class="alert">
                    <span class="closebtn" onclick="this.parentElement.remove();">&times;</span> 
                    Email not exist.
                </div>';
        }
    }
?>
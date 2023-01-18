<?php 
    if (isset($_POST["signup"]) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) ) {

        $full_name = htmlspecialchars(trim($_POST["name"]));
        $email = htmlspecialchars(trim($_POST["email"]));
        $password = htmlspecialchars($_POST["password"]);
        $password = password_hash($password , PASSWORD_DEFAULT);

        $pattern_email = "/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/";
        $pattern_name = "/^[A-Za-z]{4,10}$/";

        if (preg_match($pattern_name , $full_name) && preg_match($pattern_email , $email) && strlen($password) > 8) {
            $user = new User();
            $result = $user->getEmail($email);
            $num = mysqli_num_rows($result);
            
            if ($num != 0) {
                echo '<div class="alert">
                <span class="closebtn" onclick="this.parentElement.remove();">&times;</span> 
                <strong>Email</strong> already exist.
                </div>';
            }else {
                $user = new User();
                $result = $user->signup($full_name , $email , $password);
                if ($result) {
                    echo '<div class="alert success">
                    <span class="closebtn">&times;</span>  
                    <strong>Success!</strong> account was created .
                  </div>';
                }else {
                    echo '<div class="alert">
                    <span class="closebtn" onclick="this.parentElement.remove();">&times;</span> 
                    something wrong.
                    </div>';
                }
            }
        }else {
            echo '<div class="alert">
                    <span class="closebtn" onclick="this.parentElement.remove();">&times;</span> 
                    something wrong.
                    </div>';
        }

    }
?>
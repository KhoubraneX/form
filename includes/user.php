<?php 
class User {
    public function logout() {
        session_destroy();
    }
    public function getInfo($id) {
        $db = new DB();
        return $db->query("SELECT id , full_name , email FROM `users` WHERE id = '$id'");
        $db->close();
    }
    public function signin($email) {
        $db = new DB();
        return $db->query("SELECT id , full_name , email , password FROM `users` WHERE email = '$email'");
        $db->close();
    }
    public function getEmail($email) {
        $db = new DB();
        return $db->query("SELECT email FROM `users` WHERE email = '$email'");
        $db->close();
    }
    public function signup($name , $email , $password) {
        $db = new DB();
        $result = $db->query("INSERT INTO `users`(full_name , email , password) VALUES ('$name' , '$email' , '$password')");
        $db->close();

        return $result;
    }  
} 
?>
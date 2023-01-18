<?php
if (isset($_SESSION["auth"]) && $_SESSION["auth"] == true && isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $user = new User();
    $res = $user->getInfo($id);

    if ($res) {
      $user_info = mysqli_fetch_assoc($res);
    }else {
      header("Location: index.php");
    }
  } else {
    header("Location: index.php");
  }

  if (isset($_POST["logout"])) {
    $user->logout();
    header("Location: index.php");
  }
?>
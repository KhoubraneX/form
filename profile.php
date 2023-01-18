<?php
  session_start();
  require("./includes/db.php");
  require("./includes/user.php");
  require("./includes/user_info.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <title>profile</title>
</head>
<body>
<div class="background"></div>
<div class="profile-card">
  <div class="cover"></div>
  <div class="profile">
    <div class="pic" style="background-image:url(https://api.dicebear.com/5.x/personas/svg?backgroundColor=b6e3f4,c0aede,d1d4f9);"></div>
    <div class="above-fold">
      <div class="name">
        <?php echo $user_info["full_name"]; ?>
      </div>
      <div class="role">
      <?php echo $user_info["email"]; ?>
      </div>
      <div class="location">
        <i class="fas fa-map-marker-alt"></i>Gouda, the Netherlands
      </div>
      <div class="row">
        <form method="POST">
          <button type="submit" name="logout" class="button">
            logout
          </button>
        </form>
      </div>
      <div id="expand-button">
        <i class="fas fa-arrow-down"></i>
      </div>
    </div>
    <div class="below-fold">
      <div class="about">
        <h3>
          About
        </h3>
        <p>
          Hi, I am Douwe de Vries, 28 summers young and I am passionate about User Experiences, Design, Front-end development and game development. Like to talk about any of these things? Shoot me a message!
        </p>
      </div>
      <div class="row stats">
        <div class="stat">
          <label>Posts</label>
          <div class="num">
            956
          </div>
        </div>
        <div class="stat">
          <label>Followers</label>
          <div class="num">
            312
          </div>
        </div>
        <div class="stat">
          <label>Following</label>
          <div class="num">
            104
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>

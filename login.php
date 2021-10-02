<?php
include_once "layouts/header.php"
?>

  <div class="login">
    <h4>Not a member? click <a href="register.php">here to register</a></h4>
    <form action="layouts/login-inc.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <button type="submit" name="btn">submit</button>
    </form> 
  </div>

<?php
require_once "layouts/footer.php"
?>
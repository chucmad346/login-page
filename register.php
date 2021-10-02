<?php
include_once "layouts/header.php"
?>

  <div class="login">
    <h4>Already a member? click <a href="login.php">here to login</a></h4>
    <form action="layouts/register-inc.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <input type="password" name="conpassword" placeholder="confirm password">
        <button type="submit" name="btn">submit</button>
    </form> 
  </div>

<?php
require_once "layouts/footer.php"
?>
<?php
include_once "layouts/header.php"
?>
    <div class="container">
        <p>Welcome to our home page. Kindly register tif you are a new user or login if you have already registered to access all our features.</p>
        <div class="target">
            <div class="imgclass">
                <img src="me.jpg" alt="myPassport">
            </div>
        </div>
    </div>
    <?php
        if(isset($_SESSION["sessionId"])){
            print "You are logged in";
        }else{
            print "log in failed";
        }
    
    ?>
<?php
require_once "layouts/footer.php"
?>
    
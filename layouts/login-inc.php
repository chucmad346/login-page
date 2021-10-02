<?php

if(isset($_POST["btn"])){
    require_once "madfamDatabase.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
    if(empty($username)||empty($password)){
        header("Location: ../login.php?error=emptyfields&username=".$username);
    }
    elseif(!preg_match("/^[a-zA-Z0-9]*/",$username)){
        header("Location: ../login.php?error=invalidusername&username=".$username);
        exit();
    }else{
        $sql="SELECT * FROM register WHERE username =?";
        $statement=mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($statement, $sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }else {
            mysqli_stmt_bind_param($statement, "s", $username);
            mysqli_stmt_execute($statement);
            $result=mysqli_stmt_get_result($statement);
            //check if varaible result is empty
            if($row=mysqli_fetch_assoc($result)){
                //get the password if a user is found
                $passCheck=password_verify($password, $row["password"]); //returns a boolen value
                if($passCheck == false){
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }elseif($passCheck == true){
                    //log in the user by storinf information in session variable
                    session_start();
                    $_SESSION["sessionId"] = $row["userID"];
                    $_SESSION["sessionUser"] = $row["username"];
                    header("Location: ../index.php?succes=loggedin");
                    exit();
                }else{
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
            }else{
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }
}//else{
    //header("Location: ../index.php?error=accessforbiben");
    //exit from the function
    //exit();
//}

?>
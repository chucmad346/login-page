<?php
    //check if the user clicked the submit button in other not to enter through the url
if(isset($_POST["btn"])){
    //if the submit buton is click create connection to the database
    require_once "madfamDatabase.php";
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $conpassword = $_POST["conpassword"];
    //error handling for not having an empty field
    if(empty($username)||empty($email)||empty($password)||empty($conpassword)){
        //if at least one field is empty redirect the same page
        header("Location: ../register.php?error=emptyfields&username=".$username);
        //exit from the function
        exit();
    }// use the preg_match function to check for pattern in your input field
    elseif(!preg_match("/^[a-zA-Z0-9]*/",$username)){
        //if username does not have this pattern redirect to the same page
        header("Location: ../register.php?error=invalidusername&username=".$username);
        //exit from the function
        exit();
    }// check if the password does not match the confirm password
    elseif($password !== $conpassword){
        header("Location: ../register.php?error=passwordsdonotmatch&username=".$username);
        //exit from the function
        exit();
    }// check if the username already exist in the database
    else{
        $sql="SELECT username FROM register WHERE username = ?";
        //initiate the prepare statement
        $statement = mysqli_stmt_init($con);
        //check if the prepare statement does not work
        if(!mysqli_stmt_prepare($statement, $sql)){
            header("Location: ../register.php?error=sqlerror");
            //exit from the function
            exit();
        }// if the prepare statement does not fail, take the value of the inputed field and bind it to the sql querry
        else{
            mysqli_stmt_bind_param($statement, "s", $username);
            //execute the prepare statement
            mysqli_stmt_execute($statement);
            //check now if the username already exist
            mysqli_stmt_store_result($statement);// this takes the result from the database and store it in $statement
            $rowCount = mysqli_stmt_num_rows($statement);//counts the number of rows from the information store in the $statement, the row count is usually 1 or 0,when th row count is 1 it means 1 match when it 0 is means no match
            if($rowCount > 0){
                header("Location: ../register.php?error=usernametaken");
                //exit from the function
                 exit();
            }//if the username name is not already in the dayabase insert it
            else{
                $sql = "INSERT INTO register (username, email, password) VALUES (?,?,?)";
                $statement = mysqli_stmt_init($con);
                if(!mysqli_stmt_prepare($statement, $sql)){
                    header("Location: ../register.php?error=sqlerror");
                    //exit from the function
                    exit();
                }else{//hash the password in other for it not to be visible in the database
                    $hashpassword = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($statement, "sss", $username, $email, $hashpassword);
                    //execute the prepare statement
                    mysqli_stmt_execute($statement);
                    header("Location: ../register.php?success=registered");
                    //exit from the function
                     exit();
                }
            }
    }
  }
  mysqli_stmt_closeO($statement);
  mysqli_close($con);
}
?>
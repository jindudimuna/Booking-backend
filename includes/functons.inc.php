<?php 

include './dbh.inc.php';
// include './signup.inc.php';
function emptyInputSignup($Fname, $Lname, $email, $mobile, $pwd, $pwdconfirm){
    $result=false;

    if(empty($Fname) || empty($Lname) || empty($email) || empty($mobile) || empty ($pwd) || empty($pwdconfirm)){
        $result = true;
    }else {
        
        $result = false;
    }
    return $result;
}

function invalidFirstName($Fname){
    $result = false;

    if(empty($Fname)){
        $result = true;
    }else {
        
        $result = false;
    }
    return $result;
}

 function invalidLastName($Lname){
    $result = false;

    if(empty($Lname)){
        $result = true;
    }else {
        
        $result = false;
    }
    return $result;
 }

 function invalidEmail($email){
    $result = false;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else {
        
        $result = false;
    }
    return $result;
 }
 
 function invalidMobile($mobile){
    $result = false;

    if (!preg_match('/^\\+?[1-9][0-9]{7,14}$/', $mobile)) {
        $result = true;
    }else {
        
        $result = false;
    }
    return $result;
 }

 function passwordMatch($pwd, $pwdconfirm){
    $result = false;
    if($pwd !== $pwdconfirm){
        $result = true;
    } else{
        $result = false;
    }
return $result;
 

 }

function createUser($conn, $Fname, $Lname, $email, $mobile, $pwd){
    $sql = "INSERT INTO users(usersFirstName, usersLastName, usersEmail, usersPhone, usersPassword) VALUES(?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        # code...
    }else {
        
        header('location: ../PHP2/signup.php?error=stmtfailed'); 
        exit();
    }

    $hashpassword = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssds", $Fname, $Lname, $email, $mobile, $hashpassword);
    

     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);
     header('location: ../PHP2/signup.php?error=none'); 
     exit();

}

// function createUser($conn, $Fname, $Lname, $email, $pwd){
//     $sql = "INSERT INTO users(usersFirstName, usersLastName, usersEmail, usersPhone, usersPassword) VALUES('$Fname', '$Lname', '$email', '$pwd');";
//     $stmt = mysqli_stmt_init($conn);
//     if (mysqli_stmt_prepare($stmt, $sql)) {
//         # code...
//     }else {
        
//         header('location: ../signup.php?error=stmtfailed'); 
//         exit();
//     }

//     $hashpassword = password_hash($pwd, PASSWORD_DEFAULT);

//     mysqli_stmt_bind_param($stmt, "sssss", $Fname, $Lname, $email, $mobile, $hashpassword);


//      mysqli_stmt_execute($stmt);
//      mysqli_stmt_close($stmt);
//      header('location: ../signup.php?error=none'); 
//      exit();

// }
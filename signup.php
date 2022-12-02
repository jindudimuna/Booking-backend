<?php
include './header.php';
?>

<?php 

$Fname = $Lname = $email = $mobile = $pwd = '';
$errors = array('first-name' =>'' , 'last-name' => '', 'email' =>'' ,'phone' => '', 'Password' => '');


if (isset($_POST['submit'])) {
    # code...
//     $Fname = $_POST['first-name'];
//     $Lname= $_POST['last-name'];
//     $email = $_POST['email'];
//     $mobile = $_POST['phone'];
//     $pwd  = $_POST['Password'];
//     $pwdconfirm = $_POST['confirm-password'];

     include '../php2/includes/dbh.inc.php';
// check firstname
          if (empty($_POST['first-name'])) {

          $errors['first-name'] = 'please enter your firstname<br>';
          echo $errors['first-name'];

          } else {
               $Fname = $_POST['first-name'];
          }

  
     if(empty($_POST['last-name'])){
               $errors['last-name'] = 'please enter your lastname <br>';
     }else {

          $Lname = $_POST['last-name'];
     }

 

 
     if(empty($_POST['email'])){
          $errors['email'] = 'please enter a valid email<br>';
     } else{
        $email = $_POST['email'];
          if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
               $errors['email'] = 'please enter a valid email <br>';
     }else {

               $email = $_POST['email'];
     }
  
     }
    
  

 
     if (empty($_POST['phone'])) {
          $errors['phone'] = "please enter a phone number with its country code<br>";  
     }else{
          $mobile = $_POST['phone'];
          if (!preg_match('/^\\+?[1-9][0-9]{7,14}$/', $mobile)) {
               $errors['phone'] = 'please input your number in the right format <br>';
      }else {
 
                $mobile = $_POST['phone'];
      }
     }

 if (empty($_POST['Password'])) {
          $errors['Password'] = 'password cannot be empty';
 } else{
          $pwd = $_POST['Password'];
          
     if($pwd !== $_POST['confirm-password']){
          $errors['Password'] = 'Passwords do not match<br>';
          } else{
          $pwd = $_POST['confirm-password'];
     }
 }
 

 
    if(!array_filter($errors)){
        $Fname = mysqli_real_escape_string($conn, $_POST['first-name']);
        $Lname = mysqli_real_escape_string($conn, $_POST['last-name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mobile = mysqli_real_escape_string($conn, $_POST['phone']);
        $pwd = mysqli_real_escape_string($conn, $_POST['Password']);
     
     
        // createUser


          $sql = "INSERT INTO users(usersFirstName, usersLastName, usersEmail, usersPhone, usersPassword) VALUES(?, ?, ?, ?, ?);";
          $stmt = mysqli_stmt_init($conn);
          if (mysqli_stmt_prepare($stmt, $sql)) {
              # code...
          }else {
              
              header('location: ../PHP2/signup.php?error=stmtfailed'); 
              exit();
          }
      
          $hashpassword = password_hash($Password, PASSWORD_DEFAULT);
      
          mysqli_stmt_bind_param($stmt, "sssds", $Fname, $Lname, $email, $mobile, $hashpassword);
          
      
           mysqli_stmt_execute($stmt);
           mysqli_stmt_close($stmt);
           header('location: ../PHP2/signup.php?error=none'); 
           exit();
      

    }

else{
    header('location: ./signup.php'); 
    exit();
}
}

?>


   <div class="first-section">
    <h1> This is the important text</h1>
    </div>

    <section class="create">

<h1 class="account"> CREATE A NEW ACCOUNT</h1>

<!-- closing tag for create section -->
</section>

<!-- <div class="form-list"> -->

<form class="signup-form" action="signup.php" method="POST">

    <div class="form-style">

   <div>
        <p class="title"> Firstname</p>
        <input type="text" name="first-name" class="field" value="<?php echo htmlspecialchars($Fname); ?>"  >
   </div>

  <div>
  <p class="red-text"><?php echo $errors['first-name']; ?></p>
  </div>

   <div>
        <p class="title"> Lastname</p>
        <input type="text" name="last-name" class="field" value="<?php echo htmlspecialchars($Lname);?>">
   </div>

  <div >
  <p class="red-text"><?php echo $errors['last-name']; ?></p>  </div>

   <div>
    <p class="title"> Email</p>
    <input type="email" name="email" class="field" placeholder="example@email.com" value="<?php echo htmlspecialchars($email); ?>" >
</div>

<div >
<p class="red-text"><?php echo $errors['email']; ?></p>
  </div>

<div>
    <p class="title"> Mobile phone</p>
    <input type="tel" name="phone" class="field" placeholder="+12 345 6789" value="<?php echo htmlspecialchars($mobile); ?>">
</div>

<div >
     <p class="red-text"><?php echo $errors['phone']; ?></p>
  </div>


<div>
<p class="title"> Password</p>
<input type="password" name="Password" class="field" value="<?php echo htmlspecialchars($pwd); ?>">
</div>

<div >
<p class="red-text"><?php echo $errors['Password']; ?></p>  
</div>

<div>
<p class="title"> Confirm Password</p>
<input type="password" name="confirm-password" class="field" >
</div>


<!-- closing tag for form-style -->
</div>

<hr class="line">


<div class="clause-section">

      <p class="clause">By sigining in or creating an account, you agree to our 
         <a href="#">terms and conditions </a> and <a href="#"> privacy statement</a>. </p>
    <!--closing tag for clause-section  -->
    </div>
  <div class="submit">
       <input type="submit" value="SIGN UP" name="submit" class="btn">
       <!-- closing tag for submit -->
  </div>
</form>



    <?php 
    include './footer.php';
    ?>
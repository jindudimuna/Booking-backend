<?php 
include './header.php';
?>


<section class="create">

        <h1 class="account"> LOGIN</h1>

<!-- closing tag for create section -->
    </section>

        <form class="signup-form" action="includes/login.inc.php" method="POST">

            <div class="login-form">

                <div>
                    <p class="title"> Email</p>
                    <input type="email" name="email" class="field" placeholder="example@email.com" >
               </div>
        
               <div>
                <p class="title"> Password</p>
                <input type="password" name="Password" class="field" >
           </div>
</div>
<div class="submit">
    <input type="submit" value="LOGIN" class="btn">
    <!-- closing tag for submit -->
</div>
</form>

<?php
include './footer.php';
?>
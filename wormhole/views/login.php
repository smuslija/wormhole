<?php
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['validation'])){
    
    header('location:index.php?action=private');
}

?>

<div class="form-container column">
    <h3  class="ff-sans-cond uppercase text-white letter-spacing-2">Login</h3>
    <form method="post" tabindex="0" id="login-form" class="column form">
        <input class="form-input" type="email" tabindex="0"  name="login-email" id="login-email" placeholder="login-email">
        <input class="form-input" type="password" tabindex="0" name="login-password" id="login-password" placeholder="login-password">
        <button class="btn form-btn"type="submit" name="login-submit">Submit</button>
    </form>
</div>

<?php
$usersController = new UsersController();
$usersController->loginUserController();

/* if(isset($_GET['action'])){
    if($_GET['action'] == 'error'){
        echo'Login Failed';
    }
} */
?>
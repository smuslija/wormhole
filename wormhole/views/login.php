<?php
session_start();

if(isset($_SESSION['validation'])){
    
    header('location:index.php?action=private');
}

?>
<form method="post">
    <input type="email" name="login-email">
    <input type="password" name="login-password">
    <button type="submit" name="login-submit">Submit</button>
</form>

<?php
$usersController = new UsersController();
$usersController->loginUserController();

/* if(isset($_GET['action'])){
    if($_GET['action'] == 'error'){
        echo'Login Failed';
    }
} */
?>
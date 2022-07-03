<?php
session_start();
if(!(isset($_SESSION['validation']) && !(isset($_SESSION['admin'])))){
    header('views/login.php');
}
?>
<h2>Private admin</h2>
<form method="post" id="create-user-form">
    <input type="email" name="create-email" placeholder="email">
    <input type="password" name="create-password" placeholder="password">
    <input type="text" name="create-first-name" placeholder="first-name">
    <input type="text" name="create-last-name" placeholder="last-name">
    <input type="number" name="create-role" placeholder="role">
    <button type="submit" name="create-user-submit">Submit</button>
</form>


<?php
$usersController = new UsersController();
$usersController->createUserController();

/* if(isset($_GET['action'])){
    if($_GET['action'] == 'error'){
        echo'Login Failed';
    }
} */
?>
<script type="text/javascript" src="./assets/js/main.js" ></script>

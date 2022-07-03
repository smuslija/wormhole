<?php
session_start();
if(!isset($_SESSION['validation']) && !isset($_SESSION['admin'])){
    header('location:index.php?action=login'); 
}
?>
<div class="hidden msg error-msg">hidden</div>
<h2>Private admin</h2>
<form method="post" id="create-user-form">
    <input type="email" name="create-email" id="create-email" placeholder="create-email">
    <input type="password" name="create-password" id="create-password" placeholder="create-password">
    <input type="text" name="create-first-name" id="create-first-name" placeholder="first-name">
    <input type="text" name="create-last-name" id="create-last-name" placeholder="last-name">
    <input type="text" name="create-role" id="create-role" placeholder="role">
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
<script src="./assets/js/main.js" type="module" ></script>

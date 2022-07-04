<?php
if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['validation']) && !isset($_SESSION['admin'])){
    header('location:index.php?action=login'); 
}
?>
<div class="form-container column">
    <h3  class="ff-sans-cond uppercase text-white letter-spacing-2">Create New User</h3>
    <form method="post" tabindex="0" id="create-user-form" class="column form">
        <input class="form-input"type="email" tabindex="0" name="create-email" id="create-email" placeholder="create-email">
        <input class="form-input"type="password" tabindex="0" name="create-password" id="create-password" placeholder="create-password">
        <input class="form-input"type="text" tabindex="0" name="create-first-name" id="create-first-name" placeholder="first-name">
        <input class="form-input"type="text" tabindex="0" name="create-last-name" id="create-last-name" placeholder="last-name">
        <input class="form-input"type="text" tabindex="0" name="create-role" id="create-role" placeholder="role">
        <button class="btn form-btn"type="submit" name="create-user-submit">Submit</button>
    </form>
</div>


<ul class="msg-container"></ul>


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

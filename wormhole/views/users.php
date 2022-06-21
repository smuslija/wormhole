<?php
session_start();

if(!$_SESSION['validation']){

   header('location:index.php?action=login');

    exit();
}
?>
<?php
$uiController = new UiController();
$uiController->signUpNewUserUiController();
$uiController->deleteUserUiController();
$uiController->editUserUiController();

$uiController->createNewPostUiController();
$uiController->deletePostUiController();
$uiController->editPostUiController();


if(isset($_GET['action'])){
    if($_GET['action'] == 'ok'){
      echo'dati inseriti correttamente';
    }
}
?>
<h2>UTENTI</h2>
<?php

if(isset($_GET['action'])){

    if($_GET['action'] == 'edit'){

        echo 'hai aggiornati i dati';
    }
}
//require('registration.php')
?>
<main class="wrapper">
    <section class="container">
    <form method="post" class="private-form new-user-form">
            <div class="form-header">
                <h3 class="form-title">Create New User</h3>
            </div>
            <div class="form-inputs">
                <div class="form-group">
                    <label for="posty-title">Nome</label>
                    <input type="posty-title" class="form-control" placeholder="posty-title" name="first-name">
                </div>

                <div class="form-group">
                    <label for="last-name">Cognome</label>
                    <input type="last-name" class="form-control" placeholder="last-name" name="last-name">
                </div>

                <div class="form-group">
                    <label for="company">Società</label>
                    <input type="company" class="form-control" placeholder="company" name="company">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" placeholder="email" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" placeholder="password" name="password">
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-primary" name="signup-new-user">Invia</button>
        </form>

        <div class="private-list">
            <?php
                $uiController = new UiController();
                $uiController->showUserslistuiController();
            ?>
        </div>                 
    </section>
    <section class="container">
        <form method="post" class="private-form new-post-form">
            <div class="form-header">
                <h3 class="form-title">Create New Post</h3>
            </div>
            <div class="form-inputs">
                <div class="form-group">
                    <label for="posty-title">Title</label>
                    <input type="text" class="form-control" placeholder="posty-title" name="post-title" required>
                </div>

                <div class="form-group">
                    <label for="post-body">Content</label>
                    <input type="text" class="form-control" placeholder="post-body" name="post-body" required>
                </div>
            </div>

            <button type="submit" class="btn btn-block btn-primary" name="submit-post">Invia</button>
        </form>

        <div class="private-list">
            <?php $uiController->showAllPostsUiController(); ?>
        </div>
    </section>
</main>




   
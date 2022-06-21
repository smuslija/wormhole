<?php
/* session_start();

if(!$_SESSION['validation']){

   header('location:index.php?action=login');

    exit();
} */
?>
<h2>BLOG</h2>
<?php

if(isset($_GET['action'])){

    if($_GET['action'] == 'edit'){

        echo 'hai aggiornati i dati';
    }
}

//require('registration.php')
?>
<form action=""></form>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">TITLE</th>
        <th scope="col">BODY</th>
        <th scope="col">USERID</th>
        <th></th>

    </tr>
    </thead>

    <tbody>

    <?php
    $uiController = new UiController();
    $uiController->showAllPostsUiController();



    ?>

    </tbody>
</table>
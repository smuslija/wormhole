<?php
/* session_start();

if(!$_SESSION['validation']){

   header('location:index.php?action=login');

    exit();
} */
?>

<?php

if(isset($_GET['action'])){

    if($_GET['action'] == 'edit'){

        echo 'hai aggiornati i dati';
    }
}

//require('registration.php')
?>

    <div class="container-column container-blog-filters">
        <h3 class="title title-center">News from the Wormhole</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, corrupti!</p>
        
        <ul class="container-row container-blog-filters">
            <li>
                <select class="blog-filter" name="topic-blog-filter" id="topic-blog-filter">
                    <option value="software">software</option>
                    <option value="process">process</option>
                    <option value="consulting">consulting</option>
                </select>
            </li>
            <li>
                <select class="blog-filter" name="month-blog-filter" id="month-blog-filter">
                    <option value="1">january</option>
                    <option value="2">February</option>
                </select>
            </li>
            <li>
                <select class="blog-filter" name="year-blog-filter" id="year-blog-filter">
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                </select>
            </li>
        </ul>
        
    </div>

    <div class="blog-container last">
        <?php
            $uiController = new UiController();
            $uiController->showAllPostsUiController();
        ?>

    </div>

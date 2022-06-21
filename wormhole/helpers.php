<?php

    function ShowloginBtn(){
        if(isset($_SESSION['validation'])){
            echo '
            <li class="nav-item">
                <a href="index.php?action=logout" class="nav-link">Logout</a>
            </li>   
            ';
        }else{
            echo'
            <li class="nav-item">
                <a href="index.php?action=login" class="nav-link">Login</a>
            </li>   
            ';
        }
    } 
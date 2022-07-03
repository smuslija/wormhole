<?php
session_start();
if(null !== $_SESSION['validation']){
    header('location:index.php?action=home');
}
?>
<h2>private user</h2>

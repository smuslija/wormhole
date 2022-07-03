<?php
session_start();
if(!isset($_SESSION['validation'])){
    header('location:index.php?action=login');
}
?>
<h2>private user</h2>

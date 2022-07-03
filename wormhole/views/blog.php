<?php
session_start();
var_dump($_SESSION);

?>
<h2>blog</h2>
<?php
$blogController = new BlogController();
$blogController->loadAllPostsController();
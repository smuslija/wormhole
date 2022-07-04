<?php
if(!isset($_SESSION)){
    session_start();
}


if(isset($_SESSION['validation']) && isset($_SESSION['admin'])){
?>
    <header class="primary-header flex">
            <h1>Wormhole</h1>
            <nav>
                <ul class="primary-navigation flex">
                    <li><a href="index.php?action=home" class="ff-sans-cond uppercase text-white letter-spacing-2">Home</a></li>
                    <li><a href="index.php?action=blog" class="ff-sans-cond uppercase text-white letter-spacing-2">Blog</a></li>
                    <li><a href="index.php?action=about" class="ff-sans-cond uppercase text-white letter-spacing-2">About Us</a></li>
                    <li><a href="index.php?action=contacts" class="ff-sans-cond uppercase text-white letter-spacing-2">Contact Us</a></li>
                    <li><a href="index.php?action=services" class="ff-sans-cond uppercase text-white letter-spacing-2">Services</a></li>
                    <li><a href="index.php?action=private-admin" class="ff-sans-cond uppercase text-white letter-spacing-2">Private</a></li>

                <li><a href="index.php?action=logout" class="ff-sans-cond uppercase text-white letter-spacing-2">Logout</a></li>    
                    
                    
                </ul>
            </nav>
        </header>
<?php
}else if(isset($_SESSION['validation']) && !isset($_SESSION['admin'])){
?>
    <header class="primary-header flex">
            <h1>Wormhole</h1>
            <nav>
                <ul class="primary-navigation flex">
                    <li><a href="index.php?action=home" class="ff-sans-cond uppercase text-white letter-spacing-2">Home</a></li>
                    <li><a href="index.php?action=blog" class="ff-sans-cond uppercase text-white letter-spacing-2">Blog</a></li>
                    <li><a href="index.php?action=about" class="ff-sans-cond uppercase text-white letter-spacing-2">About Us</a></li>
                    <li><a href="index.php?action=contacts" class="ff-sans-cond uppercase text-white letter-spacing-2">Contact Us</a></li>
                    <li><a href="index.php?action=services" class="ff-sans-cond uppercase text-white letter-spacing-2">Services</a></li>              
                    <li><a href="index.php?action=private-user" class="ff-sans-cond uppercase text-white letter-spacing-2">Private</a></li>
                    <li><a href="index.php?action=logout" class="ff-sans-cond uppercase text-white letter-spacing-2">Logout</a></li>    
                </ul>
            </nav>
        </header>
<?php
}else{
?>
    <header class="primary-header flex">
        <h1>Wormhole</h1>
        <nav>
            <ul class="primary-navigation flex">
                <li><a href="index.php?action=home" class="ff-sans-cond uppercase text-white letter-spacing-2">Home</a></li>
                <li><a href="index.php?action=blog" class="ff-sans-cond uppercase text-white letter-spacing-2">Blog</a></li>
                <li><a href="index.php?action=about" class="ff-sans-cond uppercase text-white letter-spacing-2">About Us</a></li>
                <li><a href="index.php?action=contacts" class="ff-sans-cond uppercase text-white letter-spacing-2">Contact Us</a></li>
                <li><a href="index.php?action=services" class="ff-sans-cond uppercase text-white letter-spacing-2">Services</a></li>
                <li id="login"><a href="index.php?action=login" class="ff-sans-cond uppercase text-white letter-spacing-2">Login</a></li>           
            </ul>
        </nav>
    </header>
<?php
    } 
?>
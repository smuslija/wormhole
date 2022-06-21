<nav class="navbar">

<a href="#" class="nav-branding">Wormhole</a>
    <ul class="nav-menu">
        <li class="nav-item">
            <a href="index.php?action=home" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
            <a href="index.php?action=blog" class="nav-link">Blog</a>
        </li>
        <li class="nav-item">
            <a href="index.php?action=services" class="nav-link">Services</a>
        </li>
        <li class="nav-item">
            <a href="index.php?action=users" class="nav-link">Users</a>
        </li>
       
        
        <?php
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
        ?>
    </ul>

    <div class="hamburger">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
</nav>
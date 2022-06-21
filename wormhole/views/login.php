<h2>LOGIN</h2>

<form method="post">


    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control"  aria-describedby="emailHelp" placeholder="la tua mail" name="email" required>

    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" placeholder="password" name="password" required>
    </div>

    <button type="submit" class="btn btn-block btn-primary" name="login">Invia</button>
</form>

<?php
$uiController = new UiController();
$uiController->loginUserUiController();

if(isset($_GET['action'])){
    if($_GET['action'] == 'error'){
        echo'Login Failed';
    }
}
?>
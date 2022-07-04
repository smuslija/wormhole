<?php
class routesController{

    public static function returnUrl($target){
        $url = 'views/home.php';
        
        switch($target){
            case 'home':
                $url = 'views/home.php';
                break;
            case 'blog':
                $url = 'views/blog.php';
                break;
            case 'abut':
                $url = 'views/about.php';
                break;
            case 'contacts':
                $url = 'views/contacts.php';
                break;
            case 'services':
                $url = 'views/services.php';
                break;
            case 'login':
                $url = 'views/login.php';
                break;
            case 'error-login':
                $url = 'views/login.php';
                break;
            case 'logout':
                $url = 'views/logout.php';
                break;
            case 'private-admin':
                $url = 'views/private-admin.php';
                break;
            case 'private-user':
                $url = 'views/private-user.php';
                break;
        }

        return $url;
    }
}
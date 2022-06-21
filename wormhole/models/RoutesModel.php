<?php

class RoutesModel{

    public static function returnUrl($target){

        $url = 'views/home.php';

        switch($target){
            case 'home':
                $url = 'views/home.php';
                break;
            case 'blog':
                $url = 'views/blog.php';
                break;
            case 'services':
                $url = 'views/services.php';
                break;
            case 'login':
                $url = 'views/login.php';
                break;
            case 'logout':
                $url = 'views/logout.php';
                break;
            case 'users':
                $url = 'views/users.php';
                break;
            case 'update-user':
                $url = 'views/user-card.php';
                break;
            case 'update-post':
                $url = 'views/post-card.php';
                break;
            case 'ok':
                $url = 'views/users.php';
                break;
            case 'error':
                $url = 'views/error.php';
                break;
        }

        return $url;
    }
}
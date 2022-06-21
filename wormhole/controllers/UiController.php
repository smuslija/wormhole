<?php

class UiController {

    public function showTemplate(){
        require('views/template.php');
    }

    public function routing(){

        if(isset($_GET['action'])){
            $target = $_GET['action'];
        }else{
            $target = 'index';
        }

        $response = RoutesModel::returnUrl($target);
        require($response);
    }


    /* USER RELATED FUNCTS  */
    public function loginUserUiController(){

        if(isset($_POST['login'])){

            $uiControllerData = array(
                'email' => $_POST['email'],
                'password' => $_POST['password']
            );

            $dbResponse = UsersDataModel::loginUsersDataModel($uiControllerData, 'public.users');
            

            if($dbResponse['email'] == $_POST['email'] && $dbResponse['password'] == $_POST['password']){

                //inizio una sessione
                session_start();
    
                //creo una variabile di sessione
                $_SESSION['validation'] = true;
    
                header('location:index.php?action=users');
            }else{
                header('location:index.php?action=error');
            }
        }
    }


    public function showUsersListUiController(){

        $responseDb = UsersDataModel::showUsersListUsersDataModel("public.users");

        foreach($responseDb as $row=>$data){
            echo ('
                <section class="user-card">
                    <span><p>' . $data["email"]. '</p></span>
                    <span><p>' . $data["password"]. '</p></span>
                    <span><a href="index.php?action=update-user&id='.$data["id"].'"><button class="btn btn-success">Modifica</button></a></span>
                    <span><a href="index.php?action=users&delete-user='.$data["id"].'"><button class="btn btn-danger">Cancella</button></a></span>
                </section>
               ');
        }
    }

    public function showSingleUserUiController(){
        if(isset($_GET["id"])) {
            $uiControllerData = array(

                "id" => $_GET["id"]
            );

            $responseDb = UsersDataModel::showSingleUserDataModel($uiControllerData, "public.users");

            
            echo ('
                <section class="user-card">
                        <input hidden value="'.$responseDb["id"].'" name="userId">
                        <div class="form-group">
                            <label for="email">Email</label>
                                <input type="email" class="form-control"  aria-describedby="emailHelp" value="'.$responseDb["email"].'" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">password</label>
                                <input type="text" class="form-control"  aria-describedby="passwordHelp" value="'.$responseDb["password"].'" name="password" required>
                        </div>
                        <button type="submit" name="edit-user">Edit User</button>
                </section>
                ');        
        }
    }


    public function deleteUserUiController(){

        if(isset($_GET['delete-user'])){
    
            $datiController = $_GET['delete-user'];
    
            $responseDb = UsersDataModel::deleteUserDataModel($datiController, 'public.users');
    
            if($responseDb == 'success'){

                header('location: index.php?action=ok');

            }else{
                header('location:index.php?action=error');
            }  
        }
    }


    public function signUpNewUserUiController(){
        if(isset($_POST["signup-new-user"])) {
            $uiControllerData = array(

                "email" => $_POST["email"],
                "password" => $_POST["password"]
            );

            $responseDb = UsersDataModel::signUpNewUserDataModel($uiControllerData, "public.users");
            
 
            if($responseDb == 'success'){

                header('location: index.php?action=ok');

            }else{
                header('location:index.php?action=error');
            } 
        }
    }


    public function editUserUiController(){
        if(isset($_POST['edit-user'])){

            $uiControllerData = array(
                "id" => $_POST["userId"],
                "email" => $_POST["email"],
                "password" => $_POST["password"]
            );

            $responseDB = UsersDataModel::editUserDataModel($uiControllerData, "public.users");

            /* if($responseDb == 'success'){ */
                header('location: index.php?action=ok');
            /* }else{
                header('location:index.php?action=error');
            }   */
        }
    }

    /*  BLOG POSTS FUNCTS  */
    public function showAllPostsUiController(){

        $responseDb = PostsDataModel::showAllPostsDataModel("public.posts");

        foreach($responseDb as $row=>$data){
            echo ('
                <article class="blog-post">
                    <h3 class="post-title">' . $data["title"]    . '</h3>
                    <p class="post-body">' . $data["body"] . '</p class="post-body">
                    <h6 class="post-author">' . $data["userid"] . '</h6>
                    <span><a href="index.php?action=update-post&post-id='.$data["id"].'"><button class="btn btn-success">Modifica</button></a></span>
                    <span><a href="index.php?action=users&delete-post='.$data["id"].'"><button class="btn btn-danger">Cancella</button></a></span>
                </article>');
        }
    } 


    public function showSinglePostUiController(){
        if(isset($_GET["post-id"])) {
            $uiControllerData = array(

                "id" => $_GET["post-id"]
            );

        $responseDb = PostsDataModel::showSinglePostDataModel($uiControllerData, "public.posts");

        echo ('
            <input hidden value="'.$responseDb["id"].'" name="postId">
            <div class="form-group">
                <label for="title">title</label>
                    <input type="text" class="form-control"  aria-describedby="titleHelp" value="'.$responseDb["title"].'" name="title" required>
            </div>
            <div class="form-group">
                <label for="body">body</label>
                    <input type="text" class="form-control"  aria-describedby="bodyHelp" value="'.$responseDb["body"].'" name="body" required>
            </div>
            <button type="submit" name="edit-post">Edit Post</button>
        ');
        
        }   
    }


    public function createNewPostUiController(){
        if(isset($_POST["submit-post"])) {
            $uiControllerData = array(

                "title" => $_POST["post-title"],
                "body" => $_POST["post-body"]
            );

            $responseDb = PostsDataModel::createNewPostDataModel($uiControllerData, "public.posts");
            

            if($responseDb == 'success'){

                header('location: index.php?action=ok');

            }else{
                header('location: index.php?action=error');
            }
        }
    }


    public function deletePostUiController(){

        if(isset($_GET['delete-post'])){
    
            $datiController = $_GET['delete-post'];
    
            $responseDB = PostsDataModel::deletePostDataModel($datiController, 'public.posts');
    
            if($responseDB == 'success'){
    
                header('location:index.php?action=users');
    
            }
        }
    }


    public function editPostUiController(){
        if(isset($_POST['edit-post'])){

            $uiControllerData = array(
                "title" => $_POST["title"],
                "body" => $_POST["body"],
                "id" => $_POST["postId"]
            );

            $responseDb = PostsDataModel::editPostDataModel($uiControllerData, "public.posts");

             if($responseDb == 'success'){ 
                header('location: index.php?action=ok');
             }else{
                header('location:index.php?action=error');
            }   
        }
    }
}
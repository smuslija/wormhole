<?php
class BlogController extends Dbh{

    public function loadAllPostsController(){
        $responseDb = BlogModel::loadAllPostsModel('public.posts');

        if(isset($_SESSION['admin'])){
            foreach($responseDb as $row=>$data){
                echo ('
                    <article class="">
                        <h3 class="">'.$data["title"].'</h3>
                        <p class="">'.$data["body"].'</p">
                        <h6 class="post-author">'.$data["userid"].'</h6>
                        <span><a href="index.php?action=update-post&post-id='.$data["id"].'"><button class="btn btn-success">Modifica</button></a></span>
                        <span><a href="index.php?action=users&delete-post='.$data["id"].'"><button class="btn btn-danger">Cancella</button></a></span>
                    </article>');
            }
        }else{
            foreach($responseDb as $row=>$data){
                echo ('
                    <article class="">
                        <h3 class="">'.$data["title"].'</h3>
                        <p class="">'.$data["body"].'</p">
                        <h6 class="post-author">'.$data["userid"].'</h6>
            ');
            }
        }
       
    }
}
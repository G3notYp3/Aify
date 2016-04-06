<?php
    if(isset($_GET['include'])) {
        session_start();
        require('../models/bdd.php');
        require('../models/users.php');
        $id = $_GET['ID'];
        if($_GET['include'] == 'forPost') {
            removePost($id);
            header('Location: ../index.php?p=home');
        }
        else if($_GET['include'] == 'forComment') {
            removeComment($id);
            header('Location: ../index.php?p=home');
        }
    }
    else if(empty($_SESSION['ID'])) {
        $notification = 'Il faut être connecté pour pouvoir publier.';
    }
    else if(isset($_POST['post_content'])) {
        if(!empty($_POST['post_content'])) {
            $post_content = $_POST['post_content'];
            addPost($post_content);
            $notification = 'Votre article a été publié.';
        }
        else {
             $error = 'Votre publication est vide.';
        }
    }
    else if(isset($_POST['comment_content'])) {
        if(!empty($_POST['comment_content'])) {
            $comment_content = $_POST['comment_content'];
            $check = commentExist($comment_content);
            if($check) {
                $error = 'Un commentaire est identique sur cette publication.';
            }
            else {
                addComment($comment_content);
                $notification = 'Votre commentaire a été envoyé.';
            }
        }
        else {
            $error = 'Votre commentaire est vide.';
        }
    }
?>
<?php
class Users extends BDD {
    public function addPost($post_content) {
        global $bdd;
        $add_post = $bdd->prepare('INSERT INTO posts(post_author, post_date, post_content) VALUES(:post_author, NOW(), :post_content)');
        return $add_post->execute(array(
            'post_author' => $_SESSION['ID'],
            'post_content' => $post_content));
    }

    public function removePost($id) {
        global $bdd;
        $remove_post = $bdd->prepare('DELETE FROM posts WHERE ID = :id LIMIT 1');
        $remove_post->execute(array(
            'id' => $id));
        return $remove_post->fetch();
    }

    public function showPost() {
        global $bdd;
        if(!empty($_SESSION['ID'])) {
            $post_infos = $bdd->prepare('SELECT posts.*, posts.ID AS pID, MINUTE(post_date) AS minute, HOUR(post_date) AS heure, DAY(post_date) AS jour, MONTH(post_date) AS mois, users.ID AS uID, user_name, user_sname FROM posts INNER JOIN users ON posts.post_author = users.ID WHERE users.ID = :id ORDER BY posts.ID DESC LIMIT 0, 5');
            $post_infos->execute(array(
                'id' => $_SESSION['ID']));

            while ($post_infos_result = $post_infos->fetch()) {
    ?>
                <article>
                    <header>
                        <span class="mdi-account-circle"></span>
                        <?php
                            echo '<a href="?p=user">' . $post_infos_result['user_name'] . ' ' . $post_infos_result['user_sname'] . '</a>';
                        ?>
                        <ul class="menu">
                            <li>
                                <span class="mdi-dots-vertical"></span>
                                <ul>
                                    <li>
                                        <a>
                                            <span class="mdi-pencil"></span>
                                            Modifier
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="mdi-clock"></span>
                                            Changer la date
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="mdi-folder-account"></span>
                                            Changer le(s) destinataire(s)
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="mdi-eye-off"></span>
                                            Ne pas afficher
                                        </a>
                                    </li>
                                    <li>
                                        <a
    <?php
                                            echo ' href="controllers/home.php?delete=confirm&ID=' . $post_infos_result['pID'] . '&include=forPost"' 
    ?>
                                        >
                                            <span class="mdi-delete"></span>
                                            Supprimer
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <br>
                        <br>
    <?php
                        $mois = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
                        echo '<time>' . $post_infos_result['jour'] . ' ' . $mois[$post_infos_result['mois']] . ', à ' . $post_infos_result['heure'] . ' heures ' . $post_infos_result['minute'] . '</time>';
    ?>
                    </header>
                        <div class="article_content border">
                        <p>
                            <?php
                                echo nl2br(htmlspecialchars($post_infos_result['post_content']));
                            ?>
                        </p>
                    </div>
                    <div class="article_input">
                        <span class="mdi-share-variant"></span>
                        <span class="mdi-message"></span>
                        <span class="mdi-heart"></span>
                    </div>
                    <?php
                        $pID = $post_infos_result['pID'];
                        showComment($pID);
                    ?>
                    <footer>
                        <form action="?post_master=
    <?php
                            echo $post_infos_result['pID'];
      ?>
                            " class="share_myself" method="post">
                            <input class="share_bar" maxlenght="155" placeholder="Commenter ..." name="comment_content" type="text"/>
                        </form>
                    </footer>
                </article>
    <?php
            }
        }
    }

    public function addComment($comment_content) {
        global $bdd;
        $add_comment = $bdd->prepare('INSERT INTO comments(post_master, comment_author, comment_date, comment_content) VALUES(:post_master, :comment_author, NOW(), :comment_content)');
        return $add_comment->execute(array(
            'post_master' => $_GET['post_master'],
            'comment_author' => $_SESSION['ID'],
            'comment_content' => $comment_content));
    }

    public function removeComment($id) {
        global $bdd;
        $remove_post = $bdd->prepare('DELETE FROM comments WHERE ID = :id LIMIT 1');
        $remove_post->execute(array(
            'id' => $id));
        return $remove_post->fetch();
    }

    public function showComment($pID) {
        global $bdd;

        $comment_infos = $bdd->prepare('SELECT comments.*, comments.ID AS cID, users.ID, user_name, user_sname FROM comments INNER JOIN posts ON comments.post_master = posts.ID INNER JOIN users ON comments.comment_author = users.ID WHERE post_master = :id ORDER BY comments.ID LIMIT 0, 5');
        $comment_infos->execute(array(
            'id' => $pID));

        if(!empty($comment_infos)) {
        ?>
            <div class="article_comment">
                <p>Afficher plus de commentaires</p>
                <span class="mdi-chevron-down right"></span>
            </div>
        <?php
        }

        while ($comment_infos_result = $comment_infos->fetch()) { ?>
            <div class="article_comments">
    <?php
                echo '<a class="right" href="controllers/home.php?delete=confirm&ID=' . $comment_infos_result['cID'] . '&include=forComment"><span class="mdi-close"></span></a>';
                echo '<a href="?p=user">' . $comment_infos_result['user_name'] . ' ' . $comment_infos_result['user_sname'] . '</a>';
    ?>
                <br>
                <p>
    <?php 
                echo nl2br(htmlspecialchars($comment_infos_result['comment_content']));
    ?>
                </p>
            </div>
    <?php
        }
    }

    public function commentExist($comment_content) {
        global $bdd;

        $comment_verify = $bdd->prepare('SELECT post_master, comment_content FROM comments WHERE post_master = :id AND comment_content = :comment_content ORDER BY comments.ID LIMIT 1');
        $comment_verify->execute(array(
            'id' => $_GET['post_master'],
            'comment_content' => $comment_content));

        return $comment_verify->fetch();

        }
		
}
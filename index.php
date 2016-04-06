<?php
    session_start();
    //require('config.php');
    require_once('models/bdd.php');
    require_once('controllers/user.class.php')
    $user = new User();
    
    if ($_GET['?']) : '404'  {
        header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found')
    }
    $css_pages = ['404', 'job', 'register', 'settings', 'user'];
    $getPage = (isset($_GET['p'])) ? $_GET['p'] : 'home';
    $user_infos = showFullName();
?>
<!DOCTYPE html>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN">
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="favicon.png" />
        <title>Aify</title>
        <meta name="description" content="Aify vous met à disposition les outils nécessaires à la réalisation de votre projet personnel et/ou professionnel." />
        <link rel="stylesheet" href="assets/styles/main.css" />
        <?php if(in_array($_GET['p'], $css_pages)) : ?>
        <link rel="stylesheet" href="assets/styles/<?php echo $getPage; ?>.css" />
        <?php endif; ?>
        <link rel="stylesheet" href="//cdn.materialdesignicons.com/1.5.54/css/materialdesignicons.min.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet'>
    </head>
    <body>
	   <header>
            <div id="header_primary">
                <div id="header_primary_content">
                    <ul class="menu">
                        <li>
                            <a href="#">
                                <span class="mdi-account-multiple"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Invitations</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="?p=messages">
                                <span class="mdi-comment"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="?p=messages">Messages</a>
                                </li>
                                <li class="contacts">
                                    <span class="mdi-account-circle"></span>
                                    <span class="mdi-help"></span>
                                    <a href="?p=user">Utilisateur 2</a>
                                    <br>
                                    <a href="?p=messages">Bonjour !</a>
                                </li>
                                <li class="contacts">
                                    <span class="mdi-account-circle"></span>
                                    <span class="mdi-help"></span>
                                    <a href="?p=user">Utilisateur 3</a>
                                    <br>
                                    <a href="?p=messages">Salut !</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <span class="mdi-bell"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Notifications</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="header_secondary">
                <div id="header_secondary_content">
                    <a href="#hamburger" id="navigation">
                        <span class="mdi-menu"></span>
                    </a>
                    <a href="?p=home">
                        <img alt="logo" id="logo" src="assets/pictures/Aify.svg" />
                    </a>
                    <form method="get" class="search" action="#">
                        <button class="btn_right">
                            <span class="mdi-microphone"></span>
                        </button>
                        <input type="text" class="search_bar" placeholder="Rechercher sur Aify">
                        <button class="btn_left">
                            <span class="mdi-magnify"></span>
                        </button>
                    </form>
                </div>
            </div>
        </header>
        <?php
        if (!empty($getPage)) {
            include('controllers/' . $getPage . '.php');
        }
        include('view/elements/article-hamburger.php');
        if (!empty($getPage)) {
            include('view/pages/' . $getPage . '.php');
        }
        ?>
        <footer>
            <p>Version 0.23</p>
            <a href="https://www.facebook.com/aify.eu/">FEEDBACK</a>
        </footer>
        <?php
            if(isset($notification)) {
                // echo '<audio src="assets/sounds/pop.wav" autoplay></audio>';
                echo '<footer class="notification"><p>' . $notification . '</p></footer>';
            }
            else if(isset($error)) {
                // echo '<audio src="assets/sounds/pop.wav" autoplay></audio>';
                echo '<footer class="error"><p>' . $error . '</p></footer>';
            }
        ?>
    </body>
</html>
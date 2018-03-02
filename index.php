<?php
    session_start();
    //require('config.php');
    include_once('models/bdd.php');
    include_once('models/users.php');
    
    $css_pages = ['404', 'job', 'register', 'settings', 'user'];
    $getPage = (isset($_GET['p'])) ? $_GET['p'] : 'home';
    $user_infos = showFullName();
?>
<!DOCTYPE html>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN">
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="alternate" hreflang="x-default" href="https://aify.eu/" />
        <link rel="icon" type="image/png" href="favicon.png" />
        <link rel="icon" sizes="192x192" href="high-res.png" />
        <meta property="og:image" content="https://aify.eu/assets/pictures/aify.png" />
        
        <title>Aify</title>
        <meta property="og:title" content="Aify" />
        <meta name="description" content="Aify vous met à disposition les outils nécessaires à la réalisation de votre projet personnel et/ou professionnel." />
        <meta property="og:description" content="Aify vous met à disposition les outils nécessaires à la réalisation de votre projet personnel et/ou professionnel." />
        <meta property="og:type" content="website" />

        <meta property="og:url" content="https://aify.social/" />
        
        <script type="application/ld+json">
            {
              "@context": "http://schema.org",
              "@type": "Organization",
              "logo": "https://aify.eu/assets/pictures/aify.svg",
              "founder": "Lenny Obez",
              "foundingDate": "2015",
              "foundingLocation": "Amay",
              "brand": "Aify",
              "address": [{
                "@type": "PostalAddress",
                "streetAddress": "69B/r2 Chaussée de Liège",
                "addressLocality": "Amay",
                "addressRegion": "Liège"
              }],
              "url": "https://aify.social",
              "sameAs": [
                "https://www.facebook.com/aify.social/",
                "https://www.twitter.com/AIFY_eu",
                "https://plus.google.com/b/111112926769464861794/+AifyEu",
                "https://www.youtube.com/c/AifyEu",
                "https://www.linkedin.com/company/aify"
              ],
              "contactPoint": [{
                "@type": "contactPoint",
                "telephone": "+32(4)95733136",
                "email": "info@aify.social",
                "contactType": "technical support",
                "availableLanguage": ["French", "English"]
              }],
              "potentialAction": [{
                "@type": "SearchAction",
                "target": "https://aify.social/recherche?p={search_term}",
                "query-input": "required name=search_term"
            }]
            }
        </script>
        
        <link href="https://plus.google.com/b/111112926769464861794/+AifyEu" rel="publisher" />
        
        <meta name="viewport" content="width=device-width, initial-scale=.7">
        
        <meta name="theme-color" content="#2196F3" />
        <meta name="msapplication-navbutton-color" content="#2196F3">
        <meta name="apple-mobile-web-app-status-bar-style" content="#2196F3">
        <link rel="stylesheet" href="assets/styles/main.css" />
        <?php if(in_array($_GET['p'], $css_pages)) : ?>
        <link rel="stylesheet" href="assets/styles/<?php echo $getPage; ?>.css" />
        <?php endif; ?>
        <link rel="stylesheet" href="assets/styles/materialdesignicons.min.css" media="none" onload="if(media!='all')media='all'" />
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500' media="none" onload="if(media!='all')media='all'" />
        <noscript>
            <link rel="stylesheet" href="assets/styles/materialdesignicons.min.css" />
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" />
        </noscript>
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
                        <img alt="logo d'Aify" id="logo" src="assets/pictures/aify.svg" />
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
            <a href="mailto:support@aify.social">FEEDBACK</a>
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
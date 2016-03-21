<article class="profile">
    <header>
        <div class="transparent"></div>
        <a href="?p=user">
            <span class="mdi-account-circle"></span>
            <?php
                if($user_infos) {
                    echo '<p class="body2">' . $user_infos['user_name'] . ' ' . $user_infos['user_sname'] . '</p>';
                }
                else {
                    echo '<p class="body2">Invité</p>';
                }
            ?>
        </a>
        <ul class="menu">
            <li>
                <span class="mdi-menu-down"></span>
                <ul>
                    <li>
                        <?php
                            if($user_infos) {
                                echo '<a href="?p=logout">Se déconnecter</a>';
                            }
                            else {
                                echo '<a href="?p=register">Se connecter</a>';
                            }
                        ?>
                    </li>
                </ul>
            </li>
        </ul>
        <a href="#">
            <span class="mdi-chevron-left"></span>
        </a>
    </header>
    <nav>
        <a href="?p=home">
            <span class="mdi-view-dashboard"></span>
            <p>Accueil</p>
        </a>
        <a href="?p=user">
            <span class="mdi-account"></span>
            <p>Profil</p>
        </a>
        <a href="#">
            <span class="mdi-account-multiple"></span>
            <p>Contacts</p>
        </a>
        <a class="subheader start" href="#">
            <span class="mdi-folder-account"></span>
            <p>Amis</p>
        </a>
        <a href="#">
            <span class="mdi-folder-account"></span>
            <p>Famille</p>
        </a>
        <a href="#">
            <span class="mdi-folder-account"></span>
            <p>Collègues</p>
        </a>
        <a href="#">
            <span class="mdi-folder-account"></span>
            <p>Connaissances</p>
        </a>
        <a class="subheader end" href="#">
            <span class="mdi-plus"></span>
            <p>Créer un groupe personnalisé</p>
        </a>
        <a href="?p=messages">
            <span class="mdi-forum"></span>
            <p>Messages</p>
        </a>
        <a href="?p=settings">
            <span class="mdi-settings"></span>
            <p>Paramètres</p>
        </a>
        <a href="http://support.aify.eu">
            <span class="mdi-help-circle"></span>
            <p>Aide</p>
        </a>
    </nav>
</article>
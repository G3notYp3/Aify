<section class="col_medium right">
    <article>
        <header>
            <span class="mdi-account-multiple"></span>
            <h2>Connaissez-vous&nbsp;?</h2>
        </header>
        <div class="article_content">
            <?php
                showPeople();
            ?>
        </div>
    </article>
    <article>
        <header>
            <span class="mdi-briefcase"></span>
            <h2>Vos pages</h2>
            <?php
                if(!empty($_SESSION['ID'])) {
                ?>
            <input id="setting_notification" type="checkbox" />
            <label for="setting_notification"><span class="mdi-checkbox-blank-outline"></span><span class="mdi-checkbox-marked"></span>Afficher notifications</label>
        </header>
        <div class="article_content">
            <span class="mdi-chart-arc"></span>
            <h3>Performances</h3>
            <div class="informations">
                <p>Abonnés</p>
                <p class="h1">100</p>
            </div>
            <meter high="75" low="25" max="100" min="0" value="75"></meter>
            <div class="informations">
                <p>Clics</p>
                <p class="h1">75</p>
            </div>
            <div class="informations">
                <p>Portées</p>
                <p class="h1">100</p>
            </div>
        </div>
        <?php
            }
            else {
            ?>
                </header>
                    <div class="contacts">
                        <span class="mdi-account-check"></span>
                        <span class="mdi-blank"></span>
                        <a href="?p=register">Nécessite un compte</a>
                        <br>
                        <a href="?p=register">Pour cette fonctionnalité</a>
                    </div>
            <?php
            }
        ?>
        <header>
            <span class="mdi-map-marker-radius"></span>
            <h2>À proximité</h2>
        </header>
        <?php
            if(!empty($_SESSION['ID'])) {
                ?>
                <div class="article_content">
        
                </div>
                <?php
            }
            else {
            ?>
              <div class="contacts">
                  <span class="mdi-account-check"></span>
                  <span class="mdi-blank"></span>
                  <a href="?p=register">Nécessite un compte</a>
                  <br>
                  <a href="?p=register">Pour cette fonctionnalité</a>
              </div>
            <?php
            }
        ?>
    </article>
    <small role="contentinfo">Français (France)<br>
    Ce(tte) œuvre de <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.aify.eu/" property="cc:attributionName" rel="cc:attributionURL">Aify</a> est mise à disposition selon les termes de la <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">licence Creative Commons Attribution -  Partage dans les Mêmes Conditions 4.0 International</a>.</small>
</section>
<section class="col_medium left">
    <?php
        include("view/elements/article-profile.php");
    ?>
    <article id="weather">
        <header>
            <p class="h2">Liège</p>
            <p>Lun, 12:30, Ensoleillé</p>
        </header>
        <div class="article_content border">
            <p class="display-3">24<sup>°C</sup></p>
            <span class="mdi-brightness-1"></span>
            <br>
            <span class="mdi-weather-windy"></span><p>10km/h</p>
            <br>
            <span class="mdi-weather-rainy"></span><p>3%</p>
            <br>
            <input type="range" value="50" min="0" max="100" step="10" />
            <div class="tomorrow">
                <p>Mardi</p><p>26°/14°</p><span class="mdi-weather-cloudy"></span>
            </div>
            <div class="tomorrow">
                <p>Mercredi</p><p>18°/9°</p><span class="mdi-weather-pouring"></span>
            </div>
            <div class="tomorrow">
                <p>Jeudi</p><p>22°/13°</p><span class="mdi-weather-partlycloudy"></span>
            </div>
        </div>
        <div class="article_input">
            <input type="submit" class="btn flat" value="RAPPORT COMPLET" />
        </div>
    </article>
</section>
<section class="col_large">
    <article>
        <form action="" class="publication" method="post">
            <div class="article_content">
                <textarea class="share_bar" name="post_content" placeholder="Partagez ce que vous voulez..."></textarea>
            </div>
            <div class="article_input">
                <span class="mdi-camera"></span>
                <span class="mdi-account-plus"></span>
                <span class="mdi-clock"></span>
                <span class="mdi-map-marker"></span>
                <input class="btn raised white right" type="submit" value="PARTAGER" />
                <input class="btn raised blue right" type="submit" value="AVANCÉ" />
            </div>
        </form>
    </article>
    <?php
        showPost();
    ?>
    <article>
        <header>
            <p class="h2">Bienvenue 
                <?php
                if($user_infos) {
                    echo '<a class="h2" href="?p=user">' . $user_infos['user_name'] . ' ' . $user_infos['user_sname'] . '</a>';
                }
                else {
                    echo '<a class="h2" href="?p=user">Invité</a>';
                }
            ?>&nbsp;!</p>
        </header>
        <div class="article_content">
            <p>Vous 
                <?php
                    if($user_infos) {
                        echo 'êtes nouveau sur le réseau, désirez-vous faire une visite des lieux';
                    }
                    else {
                        echo 'n\'êtes pas connecté, souhaitez-vous vous inscrire ou vous connecter';
                    }
                ?>&nbsp;?</p>
        </div>
        <div class="article_input">
            <span class="mdi-verified"><span>Les publications vérifiées sont des publications de confiance</span></span>
            <?php
                if($user_infos) {
                    echo '<input type="submit" class="btn flat orange" value="FERMER" />
                    <input type="submit" class="btn flat orange" value="VISITER" />';
                }
                else {
                    echo '<input type="submit" class="btn flat orange" value="FERMER" />
                    <input type="submit" href="?p=register" class="btn flat orange" value="SE CONNECTER" />';
                }
            ?>
        </div>
    </article>
    <article class="no_header">
        <div class="article_content">
            <div class="img_frame_large">
                <img src="assets/pictures/case-day.png" />
            </div>
        </div>
        <div class="article_content">
            <p class="h2">Mise à jour</p>
            <p>Une récente mise à jour a été effectuée pendant la nuit.</p>
        </div>
        <div class="article_input">
            <span class="mdi-verified"><span>Les publications vérifiées sont des publications de confiance</span></span>
            <input type="submit" class="btn flat orange" value="FERMER" />
            <input type="submit" class="btn flat orange" value="EXPLORER" />
        </div>
    </article>
    <article>
        <div class="article_content">
            <div class="img_frame_large">
                <img src="assets/pictures/train-morning.png" />
            </div>
        </div>
        <div class="article_input">
            <span class="mdi-verified"><span>Les publications vérifiées sont des publications de confiance</span></span>
            <input type="submit" class="btn flat orange" value="FERMER" />
        </div>
    </article>
    <article class="no_hc">
        <div class="article_content">
            <div class="img_frame_large">
                <img src="assets/pictures/city-night.png" />
            </div>
        </div>
        <div class="article_content">
            <h2>Les projets du jour</h2>
        </div>
        <div class="article_input">
            <span class="mdi-share-variant"></span>
            <span class="mdi-message"></span>
            <span class="mdi-heart"></span>
        </div>
        <div class="article_comment">
            <p>Afficher plus de commentaires</p>
            <span class="mdi-chevron-down right"></span>
        </div>
        <footer>
            <form method="post" class="share_myself" action="#">
                <input class="share_bar" maxlenght="155" placeholder="Commenter ..." type="text"/>
            </form>
        </footer>
    </article>
    <article>
        <header>
            <span class="mdi-account-circle"></span>
            <?php
                if($user_infos) {
                    echo '<a href="?p=user">' . $user_infos['user_name'] . ' ' . $user_infos['user_sname'] . '</a>';
                }
                else {
                    echo '<a href="?p=register">Invité</a>';
                }
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
                            <a>
                                <span class="mdi-delete"></span>
                                Supprimer
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <br>
            <br>
            <time>19 février</time>
        </header>
        <div class="article_content border">
            <div class="img_frame_medium">
                <img src="assets/pictures/1.png" />
            </div>
            <div class="img_frame_small">
                <img src="assets/pictures/2a.jpg" />
            </div>
            <div class="img_frame_small">
                <img src="assets/pictures/2b.jpg" />
            </div>
            <div class="img_frame_small">
                <img src="assets/pictures/3a.jpg" />
            </div>
            <div class="img_frame_small">
                <img src="assets/pictures/3b.png" />
            </div>
            <div class="img_frame_small">
                <img src="assets/pictures/4.png" />
            </div>
        </div>
        <div class="article_input">
            <span class="mdi-share-variant"></span>
            <span class="mdi-message"></span>
            <span class="mdi-heart"></span>
        </div>
        <div class="article_comment">
            <p>Afficher plus de commentaires</p>
            <span class="mdi-chevron-down right"></span>
        </div>
        <footer>
            <form method="post" class="share_myself" action="#">
                <input class="share_bar" maxlenght="155" placeholder="Commenter ..." type="text"/>
            </form>
        </footer>
    </article>
    <article>
        <header>
            <span class="mdi-account-circle"></span>
            <?php
                if($user_infos) {
                    echo '<a href="?p=user">' . $user_infos['user_name'] . ' ' . $user_infos['user_sname'] . '</a>';
                }
                else {
                    echo '<a href="?p=register">Invité</a>';
                }
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
                            <a>
                                <span class="mdi-delete"></span>
                                Supprimer
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <br>
            <br>
            <time>19 février</time>
        </header>
        <div class="article_content border">
            <div class="img_frame_large">
                <img src="assets/pictures/5.png" />
            </div>
            <p>Voici une photo de l'I.S.S. !</p>
        </div>
        <div class="article_input">
            <span class="mdi-share-variant"></span>
            <span class="mdi-message"></span>
            <span class="mdi-heart"></span>
        </div>
        <div class="article_comment">
            <p>Afficher plus de commentaires</p>
            <span class="mdi-chevron-down right"></span>
        </div>
        <div class="article_comments">
            <a href="?p=user">Utilisateur 2</a>
            <br>
            <p>Elle a été prise d'où :o ?</p>
        </div>
        <div class="article_comments">
            <a href="?p=user">Utilisateur 3</a>
            <br>
            <p>D'un autre satellite ;)</p>
        </div>
        <footer>
            <form method="post" class="share_myself" action="#">
                <input class="share_bar" maxlenght="155" placeholder="Commenter ..." type="text"/>
            </form>
        </footer>
    </article>
    <article>
        <header>
            <span class="mdi-account-circle"></span>
            <?php
                if($user_infos) {
                    echo '<a href="?p=user">' . $user_infos['user_name'] . ' ' . $user_infos['user_sname'] . '</a>';
                }
                else {
                    echo '<a href="?p=register">Invité</a>';
                }
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
                            <a>
                                <span class="mdi-delete"></span>
                                Supprimer
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <br>
            <br>
            <time>19 février</time>
        </header>
        <div class="article_content border">
            <p>Je viens de m'inscrire sur Aify, invitez-moi !</p>
        </div>
        <div class="article_input">
            <span class="mdi-share-variant"></span>
            <span class="mdi-message"></span>
            <span class="mdi-heart"></span>
        </div>
        <div class="article_comment">
            <p>Afficher plus de commentaires</p>
            <span class="mdi-chevron-down right"></span>
        </div>
        <footer>
            <form method="post" class="share_myself" action="#">
                <input class="share_bar" maxlenght="155" placeholder="Commenter ..." type="text"/>
            </form>
        </footer>
    </article>
    <article>
        <div class="chargeur"></div>
    </article>
</section>
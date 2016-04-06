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
    <small role="contentinfo">Français (France)<br>Aify ©</small>
</section>
<section class="col_large">
    <article>
        <div class="article_content">
            <span class="mdi-account-circle"></span>
            
        </div>
        <div class="article_input">
            <nav>
                <a href="#">Profil</a>
                <a href="#">À propos</a>
                <a href="#">Contacts</a>
                <a href="#">Multimédia</a>
                <a href="#">Avis</a>
            </nav>
        </div>
    </article>
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
                    echo '<input type="submit" class="btn flat orange" value="NON" />
                    <input type="submit" href="?p=register" class="btn flat orange" value="OUI" />';
                }
            ?>
        </div>
    </article>
    <article>
        <div class="chargeur"></div>
    </article>
</section>
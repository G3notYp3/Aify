<link rel="stylesheet" href="assets/styles/register.css" />
<section class="col_large">
    <article>
        <header>
            <a href="#sign">S'inscrire</a>
            <a href="#log">Se connecter</a>
        </header>
        <div id="sign">
            <header>
                <span class="mdi-help-circle"></span>
                <span class="mdi-account-plus"></span>
                <br>
                <p>Rejoignez notre communauté</p>
            </header>
            <form action="" method="post">
                <input maxlenght="100" name="mail" placeholder="Adresse email" type="email" required />
                <br>
                <input maxlenght="100" name="name" placeholder="Prénom" type="text" required />
                <input maxlenght="100" name="sname" placeholder="Nom" type="text" required />
                <br>
                <input maxlenght="255" minlenght="8" name="pass" placeholder="Mot de passe" type="password" required />
                <br>
                <input class="btn raised white" type="submit" value="S'INSCRIRE" />
            </form>
        </div>
        <div id="log">
            <header>
                <span class="mdi-help-circle"></span>
                <span class="mdi-account-circle"></span>
                <br>
                <p>Connectez-vous avec votre compte Aify</p>
            </header>
            <form action="" method="post">
                <input maxlenght="100" name="mail" placeholder="Adresse email" type="email" required />
                <br>
                <input maxlenght="255" name="pass" placeholder="Mot de passe" type="password" required />
                <br>
                <input class="chb" id="stay_log" type="checkbox" />
                <label for="stay_log"><span class="mdi-checkbox-blank-outline"></span><span class="mdi-checkbox-marked"></span>Rester connecté</label>
                <input class="btn raised white" type="submit" value="SE CONNECTER" />
            </form>
        </div>
        <div id="result"></div>
        <footer>
            <h1 class="display-1">Aify</h1>
        </footer>
    </article>
</section>
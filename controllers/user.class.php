<?php
    class User {
        private $_mail;
        
        public function addUser($name, $sname, $pass) {
            global $bdd;
            $add_user = $bdd->prepare('INSERT INTO users(user_mail, user_name, user_sname, user_pass, user_registered) VALUES(:mail, :name, :sname, :pass, NOW())');
            return $add_user->execute(array(
                'mail' => &this->_mail,
                'name' => $name,
                'sname' => $sname,
                'pass' => $pass));
        }

        public function userExist() {
            global $bdd;
            $user_exist = $bdd->prepare('SELECT ID FROM users WHERE user_mail = :mail LIMIT 1');
            $user_exist->execute(['mail' => &this->_mail]);

            return $user_exist->fetch();
        }
        
        public function __construct($mail) {
            $this->setMail($mail);
        }
        
        public function setMail($mail) {
            $this->_mail = $mail;
        }

        public function getUserInfos() {
            global $bdd;
            $get_user = $bdd->prepare('SELECT ID, user_mail, user_pass FROM users WHERE user_mail = :mail LIMIT 1');
            $get_user->execute(['mail' => &this->_mail]);

            return $get_user_result = $get_user->fetch();
        }

        public function isUser() {
            global $bdd;
            if(!empty($_SESSION) AND !empty($_SESSION['ID'])) {
                $user_session = $bdd->prepare('SELECT user_name, user_sname FROM users WHERE ID = :id AND user_mail = :mail LIMIT 1');
                $user_session->execute(array(
                    'id' => $_SESSION['ID'],
                    'mail' => $_SESSION['mail']));

                return $user_session->fetch();
            }
            return false;
        }

        public function showFullName() {
            if($user_infos = isUser()) {
                return $user_infos;
            }
        }

        public function showPeople() {
            global $bdd;
            if(!empty($_SESSION['ID'])) {
                $people_infos = $bdd->query('SELECT user_name, user_sname FROM users ORDER BY RAND(ID) LIMIT 0, 3');

                while ($people_infos_result = $people_infos->fetch()) {
        ?>
                <div class="contacts">
                    <span class="mdi-account-circle"></span>
                    <span class="mdi-account-plus"></span>
                    <?php echo '<a href="?p=user">' . $people_infos_result['user_name'] . ' ' . $people_infos_result['user_sname'] . '</a>'; ?>
                    <br>
                    <a href="?p=user">Ami avec Utilisateur X</a>
                </div>
        <?php
                }
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
        }
    }
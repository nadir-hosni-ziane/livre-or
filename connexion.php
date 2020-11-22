<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "livreor";
$wrong = "";

$sql = mysqli_connect($servername, $username, $password, $dbname);
session_start();

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $query = "SELECT * FROM utilisateurs WHERE login='$login' && password='$password'";

    if (mysqli_num_rows(mysqli_query($sql, $query)) > 0) {
        $_SESSION['login'] = $login;
        if ($_POST['login'] == 'admin') {
            header("Location:admin.php");
        }
        else header("Location:profil.php");

    } else 
        $wrong = "le login ou le mot de passe n'est pas correct !";
}
elseif (isset($_SESSION['login'])) { // si deja connecter rederiction
    header("Location:profil.php");
}

?>


<!DOCTYPE html>
<hmtl lang="fr">

    <head>
        <title>konoha.com</title>
        <meta charset="utf-8" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Goldman:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+128+Text&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="livre-or.css">
    </head>

    <body class="bodynadirA">
        <header>
            <div class="head-accueil">
                <section class="encart">
                    <div class="titre1">
                        <h1 class="konoha">
                            <a href="index.php">Konoha.com<a>
                        </h1>
                    </div>
                    <nav>
                        <li><a href="connexion.php">Connexion</a></li>
                        <li><a href="inscription.php">Inscription</a></li>
                        <li><a href="livre-or.php">livre d'or</a></li>
                    </nav>
                </section>
            </div>
        </header>
        <main>
            <section class="formulaire">
                <section class="head-tableau">
                    <img class="logouchiha" src="images-or/jashin.png" alt="logo jashin">
                </section>
                <?php echo $wrong ?>
            </h3>
                <form action="" method="POST">
                <div class="meme">
                    <label for="login">Identifiant :</label>
                    <input type="text" name="login" id="login" placeholder="ID">
                </div>
                    <br>
                <div class="meme3">
                    <label for="password">password :</label>
                    <input type="password" name="password" id="password" placeholder="Mot de passe">
                </div>
                    <br>

                    <input type="submit" name="submit" value="VALIDER">
                </form>
            </section>
            <section class="enbas2">
                <a href="inscription.php">
                <div class="cadreA">
                    <div class="B">
                        <h3>
                            Créer un compte !
                        </h3>
                    </div>
                </a>
                </div>
            </section>
        </main>
        <footer>
            <section class="footer">
                    <div class="signature">
                        © PROD. BY NZ & SL QLF
                    </div>
                    <img class="symbole-head" src="images-or/sceau.png" alt="logo du village de konoha">
                    <nav class="nav2">
                        <li class="li2"><a href="connexion.php">Connexion</a></li>
                        <li class="li2"><a href="inscription.php">Inscription</a></li>
                        <li class="li2"><a href="livre-or.php">Livre d'or</a></li>
                    </nav>
                </section>
            </footer>
    </body>
</html>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="livre-or.css">
        <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+128+Text&display=swap" rel="stylesheet">

        <title></title>
    
    </head>
    
    <body class="body2">
        <header>
            <div class="head-accueil">
                <section class="encart">
                    <div class="titre1">
                        <p class= "autre">
                            <a href="index.php">Konoha.com<a>
                        </p>
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
        <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "livreor";

$sql = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $checklogin = mysqli_query($sql, "SELECT login FROM utilisateurs WHERE login='$login'");

    if (!empty($login) && !empty($password) && !empty($confirm_password)) {
        $query = "INSERT INTO utilisateurs(login, password) VALUES ('$login', '$password')";

        if ($password != $confirm_password) {
            $wrongpass = "mdp non identiques !<br>";
        } elseif (mysqli_num_rows($checklogin) != 0) {
            $existe = "L'ID existe déjà !";
        } elseif (mysqli_query($sql, $query)) {
            echo "Bienvenue $prenom !";
            header("Location:connexion.php");
        }
    } else {
        $remplissez = "Remplissez le svp !<br>";
    }

}

?>
            <h1 class="act2">Inscription</h1>
            <hr size="5" width="20%" color="white">
            <section class="formulaire">
                <section class="head-tableau">
                    <img class="logouchiha" src="images-or/logo.png" alt="logo Uchiha">
                </section>
                <form action="inscription.php" method="post">
                    <div class="meme">
                        <label for="login">Login :</label>
                        <input type="text" id="login" name="login" required>
                    </div>
                    <div class="meme3">
                        <label for="pass">Mot de passe :</label>
                        <input type="password" id="pass" name="password" required>
                    </div>
                    <div class="meme2">
                        <label for="pass">Confirmer le mot de passe :</label>
                        <input type ="password" id="pass" name ="confirm_password" required>
                    </div>
                    <div class="button">
                        <button type="submit" name="submit">S'inscire</button>
                    </div>
                </form>
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

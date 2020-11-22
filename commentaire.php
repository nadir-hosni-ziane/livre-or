<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header("Refresh: 2; url=connexion.php");
    echo "<p>Tu dois te connecter pour accéder aux commentaires !</p><br><p>Redirection en cours...</p>";
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "livreor";
$login = $_SESSION['login'];
$sql = mysqli_connect($servername, $username, $password, $dbname);


$req = mysqli_query($sql, "SELECT * FROM utilisateurs WHERE login='$login'");
$info = mysqli_fetch_assoc($req);
$id = $info['id'];
//var_dump($info);
//echo $id;



if (isset($_POST['submit'])) {
    $commentaires = $_POST['user_message'];
    $today = date('Y/m/d H:i:s');
    
    

    if (!empty($commentaires)) {
        $query = "INSERT INTO `commentaires`(`commentaire`, `id_utilisateur`, `date`) VALUES ('$commentaires', '$id', '$today')";
        mysqli_query($sql, $query);
    } else {
        $remplissez = "Remplissez le svp !<br>";
    }

}

?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="livre-or.css">
        <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+128+Text&display=swap" rel="stylesheet">
        <title>Commentaire</title>
    </head>
    
    <body class="body3">
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
            <h1 class="act2">Envoyer un commentaire</h1>
            <hr size="5" width="20%" color="white">
            <section class="formulaire">
                <section class="head-tableau">
                    <img class="comiss" src="images-or/com.png" alt="logo Naruto et Kyubi">
                </section>
                    <div class="comcom">
                        <form action="" method="post">
                        <label for="msg">Message : </label><br>
                        <textarea id="msg" name="user_message" maxlength="80" placeholder="80 caractères maximum." style="margin: 0px; width: 405px; height: 68px;" required></textarea>
                    </div>
                    <div class="button">
                        <button name="submit" type="submit">Envoyer le commentaire</button>
                    </div>
                    <?php if (!empty($commentaires)) echo "<h3>Votre commentaire a été envoyé sur la  page livre d'or </h3><a href='livre-or.php'><h3><u>Voir les commentaires</u></h3></a>"; ?>
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

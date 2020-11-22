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
        <section  class="centre">
        <div class="carrercroix"><?php

session_start();
if (!isset($_SESSION['login'])) {
    header("Refresh: 3; url=connexion.php");
    echo "<h4>Tu dois te connecter pour accéder à ton profil.</p><br><p>Redirection en cours, retour à la page d'accueil...</h4>";
    exit();
}
$login = $_SESSION['login'];
$sql = mysqli_connect('localhost', 'root', '', 'livreor');
        
    if (!$sql) {
            echo "Erreur connexion";
            exit();
    }else {
            echo "<h1>Bienvenue sur ton profil $login</h1><br>";
    }

$req = mysqli_query($sql, "SELECT * FROM utilisateurs WHERE login='$login'");
$info = mysqli_fetch_assoc($req);
$password = $info['password'];

$modification="";
$formNewLogin="";
$formNewPass="";
$same="";
$existe="";
$valide="";
$vide="";
$wrong="";





echo "<h4>Ton login est: $login<br></h4>";
echo "<h4>Ton Mot de passe est: $password<br></h4>";

    if (isset($_POST['modifier'])) {
        $modification =    "<h4>Pour modifier le Login cliquer <input type=\"submit\" name=\"modifierlogin\" value=\"ici\"><br>
                            Pour modifier le Mot de passe cliquer <input type=\"submit\" name=\"modifierpass\" value=\"ici\"><br></h4>";
    }

    // Début de chagement de l'ancien login
    if (isset($_POST['modifierlogin'])) { // si l'utilisateurs appuis sur modifier le Login ca affichera le fomulaire pour changer le Login
        $formNewLogin = "
            <form method=\"post\">
            <input type=\"text\" name=\"newlogin\" id=\"login\" placeholder=\"Entrer un nouveau login\">
            <input type=\"submit\" name=\"submitnewlogin\" value=\"valider\">
            </form>";
    }

    if (isset($_POST['submitnewlogin'])) { // si l'utilisateur appuis sur valider (submitnewlogin)
        $newLogin = $_POST['newlogin'];
        $checklogin = mysqli_query($sql, "SELECT login FROM utilisateurs WHERE login='$login'");
        
        if (!empty(trim($newLogin))) { // si le formulaire est vide s'affichera un message erreur
            $query = "UPDATE utilisateurs SET login='" . htmlentities(trim($newLogin)) . "' WHERE login='$login'";

            if ($login == $newLogin) {
                $same = "utiliser un login différent que $login !!<br>";
            }
            
            //////////////
            
            elseif (mysqli_query($sql, $query)) {
                $_SESSION['login'] = $newLogin;
                $valide = "<h4>vous avez bien modifié '$login' à '$newLogin' <br></h4>";
                header("Refresh:3");
            }
            
        }else {
            $vide = "Remplissez le formulaire SVP !!<br>";
        }
    }
    // Fin de chagement de l'ancien login
/////////////////////////////////////////
    /////////////////////////////////////////
    
// Début de chagement de l'ancien Mot de passe

    if (isset($_POST['modifierpass'])) { // si l'utilisateurs appuis sur modifier le Password ca affichera le fomulaire pour changer le Password
        $formNewPass = "
            <form class=\"formulaire\" method=\"post\">
            <input type=\"text\" name=\"pass\" id=\"nom\" placeholder=\"Entrer l'ancien Password\"><br>
            <input type=\"text\" name=\"newpass\" id=\"nom\" placeholder=\"Entrer un nouveau Password\"><br>
            <input type=\"text\" name=\"confirmnewpass\" id=\"nom\" placeholder=\"Confirmer le nouveau Password\"><br>
            <input type=\"submit\" name=\"submitnewpass\" value=\"valider\">
            </form>
        ";
    }

    if (isset($_POST['submitnewpass'])) {
        $newpassword = $_POST['newpass'];
        $confirm_password = $_POST['confirmnewpass'];
        
        if (!empty($_POST['pass']) && !empty($_POST['newpass']) && !empty($_POST['confirmnewpass'])) {
            $query = "UPDATE utilisateurs SET password='" . htmlentities($_POST['newpass']) . "' WHERE login='$login'";
    if ($_POST['pass'] == $password) {
        if ($_POST['newpass'] != $_POST['confirmnewpass']) {
            $same = "le mot de passe n'est pas le même !!<br>";
        }
        
        elseif (mysqli_query($sql, $query)) {
            echo "Le mot de passe a bien été changé";
            header("Refresh:3"); 
        }
    }else {
        $wrong = "Le mot de passe que vous avez inseré n'est pas correct";
    }
            
    
        } else {
            $vide = "Remplissez le formulaire SVP !!<br>";
        }
    
    }
    ////////
    // Fini
    ////////
    
    // déconnexion
    if (isset($_POST['deconnecter'])) {
        session_unset ( );
        header("Location: connexion.php"); 
    }

?>
        <form action="" method="post">
        <h4>Modifier tes information ici <input type="submit" name="modifier" value="Modifier"></h4>
        <p><?php echo $modification ?></p>
        <p><?php echo $formNewLogin ?></p>
        <p><?php echo $formNewPass ?></p>
        <p><?php echo $same ?></p>
        <p><?php echo $existe ?></p>
        <p><?php echo $valide ?></p>
        <p><?php echo $vide ?></p>
        <p><?php echo $wrong ?></p>
        </form>
        <form action="" method="post">
        <input type="submit" name="deconnecter" value="Déconnexion">
        </form>
        </div>
        <section class= "aj">
        <a href="commentaire.php">
        <div class="ajout-com">  
            <h4>
                Ajoute toi aussi un mot au livre d'or !
            </h4>
        </div>
        </a>
        </section>
        
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
<?php
$db = mysqli_connect('localhost', 'root', '', 'livreor');
$query = mysqli_query($db, 'SELECT date, commentaire, login FROM commentaires INNER JOIN utilisateurs ON id_utilisateur = utilisateurs.id ORDER BY date DESC ');
$headt = mysqli_query ($db, 'SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME=\'commentaires\'');
$all_result = mysqli_fetch_all($query);
//var_dump($resultat); 
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
        <section class="tableaucentre">
        <table class="tab-or">
            <thead>
                <tr>
                    <td><h3>Dates<h3></td>
                    <td class="com"><h3>Commentaires<h3></td>
                    <td><h3>Utilisateurs<h3></td>
                </thead>
            <tbody>
            <?php
            foreach ($all_result as $key) {
                echo "<tr>";
        
            foreach ($key as $value) {
                echo "<td>$value</td>";
            }
                echo "</tr>";
            }
        ?>
    </tbody>
    </table>
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
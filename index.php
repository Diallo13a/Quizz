<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quizz</title>
    <link rel="stylesheet" href="public/css/quizz.css">

</head>
<body>

    <div class="header">
        <div class="logo"></div>
        <div class="header-text">Le Plaisir de Jouer</div>
    </div>
    <div class="content">
        <?php
            session_start();
            require_once("./traitement/fonctions.php");
            if (isset($_GET['lien'])) {
                switch($_GET['lien']){
                    case "accueil":
                        require_once("./pages/admin.php");
                    break;
                    case "jeux":
                        require_once("./pages/jeux.php");
                    break;
                    case "creeradmin":
                        require_once("./pages/creeradmin.php");// ici creeradmin c'est juste pour creer un utisateur
                    break;
                }
            }else {
                if (isset($_GET['statut']) && $_GET['statut']==="logout" ) {
                    deconnexion();
                }
                require_once("./pages/connexion.php");
            }
            
        ?>
    </div>

</body>
</html>
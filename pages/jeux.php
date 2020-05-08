<div class="presentation">
<?php
is_connect();
echo $_SESSION['user']['prenom'];
echo $_SESSION['user']['nom'];

//echo $_SESSION['user']['login'];
//echo $_SESSION['user']['profil'];
//echo $_SESSION['user']['photo'];
?>
<img class='imgav' src="./public/images/admin.jpg" />
<div class="phrase">
<?php
echo "BIENVENUE SUR LA PLATFORME DE JEUX DE QUIZZ JOUER ET TESTER VOTRE NIVEAU DE CULTURE GENERAL";
?>
</div>
<a class='decon' href="index.php?statut=logout">Deconnexion</a>
</div>



<style type ="text/css">
  .imgav{
    border-radius: 50%;
    height:110px;
    width:110px;
}
.presentation{
    margin-top: 10px;
    background-color: blue;
    width: 97%;
    margin-left: 20px;
}

.decon {
        background-color: #4CAF50;
        color: white;
        margin-left: 500px;
        border: 3px solid greenyellow;
        border-radius: 6px;
        margin-left: 700px;
        text-decoration: none;
    }
    </style>
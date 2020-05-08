

<!-- 
    Erreur
    WANE BLOCK A EFFACE
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>acceuil</title> 
    
    </head>

<body>
    
    -->
  

   
    <!-- <p  style="color:white ;text-align:center;margin-top:-30px">Le plaisir de jouer</p> -->


    <div id="conteneur" style="background-color:white; width:85%; margin-left:100px;
     border-radius:10px 10px 10px 10px; margin-top:-10px; height:575px">
        <div id="bleue" style="background-color:#00FFFF ; height:60px">

        
            <div class="alignement">
            
                <p style="padding-top:20px; margin-left:300px;color:white;font-weight:bold">
               
                    CREER ET PARAMETRER VOS QUIZZ

                    <!--
                        Erreur 
                        Effacer ce formulaire 
                        <form action="" style="max-width:500px;margin:auto" method="post"> 
                    -->
                    <a href="index.php?statut=logout"  style="margin-left:670px;
                    background-color:#7FFFD4; color:white">Deconnexion</a>
                </p>
               
            </div>
       

        </div>
        <div id="gauche" style="width:30%; background-color:white; height:400px; margin-top:50px;border: 1px solid silver;border-radius:5px;">
            <div id="gauche_haut" style="background:linear-gradient(white,blue);height:150px">
             
             <?php
is_connect();
echo $_SESSION['user']['nom']." ";
echo $_SESSION['user']['prenom'];
//echo $_SESSION['user']['login'];
//echo $_SESSION['user']['profil'];<php? echo $_SESSION['user']['photo']; 
?>

    <img class='imgav' src="./public/images/admin.jpg" style="margin-left:50px" style="" />


            </div>
            <a href="index.php?lien=accueil&block=listequestions" style="text-decoration:none">
            <div class="listequestions" style="background-color:white; height:30px;margin-top:30px;border: 1px solid silver">
               
                <div style="padding-top:5px">Liste Questions</div>
                <div class="ic-liste" style="margin-top:-22px">
                    <img src="./public/icones/ic-liste.ico" alt="icone_liste" style="width:20px;height:30px;margin-left:300px;">
                </div>
            </div>
            </a>

            <a  href="index.php?lien=accueil&block=creationadmin" style="text-decoration:none">
            <div class="listequestions" style="background-color:white; height:30px;margin-top:30px;border: 1px solid silver">
               
                <div style="padding-top:5px">Créer Admin</div>
                <div class="ic-ajout" style="margin-top:-22px">
                    <img src="./public/icones/ic-ajout.ico" alt="icone_ajout" style="width:20px;height:30px;margin-left:300px;">
                </div>
            </div>
            </a>

            <a href="index.php?lien=accueil&block=joueur" style="text-decoration:none">
            <div class="listequestions" style="background-color:white; height:30px;margin-top:30px;border: 1px solid silver">
               
                <div style="padding-top:5px">Liste joueurs</div>
                <div class="ic-liste" style="margin-top:-22px">
                    <img src="./public/icones/ic-liste.ico" alt="icone_liste" style="width:20px;height:30px;margin-left:300px;">
                </div>
            </div>
            </a>

            <a href="index.php?lien=accueil&block=question" style="text-decoration:none">
            <div class="listequestions" style="background-color:white; height:30px;margin-top:30px;border: 1px solid silver">
               
                <div style="padding-top:5px">Créer Questions</div>
                <div class="ic-ajout" style="margin-top:-22px">
                    <img src="./public/icones/ic-ajout.ico" alt="icone_ajout" style="width:20px;height:30px;margin-left:300px;">
                </div>
            </div>
        
            </a>
    
        </div>
        <div id="droite" style="width:65%; background-color:gray; height:465px; margin-top:-435px;margin-left:350px">
        
            <?php
            
            if (isset($_GET['block'])) {
                if ($_GET['block']=="creationadmin") {
                     include("creeradmin.php");
                }
                if ($_GET['block']=="listequestions") {
                     include("listequestions.php");
                }
                if ($_GET['block']=="joueur") {
                     include("joueur.php");
                 }
                 if ($_GET['block']=="question") {
                     include("creerquestion.php");
                 }
             }
             else {
                 include("listequestions.php");
             }
             

          
            ?>
        </div>

    </div>

<!-- 
 Erreur
 Block a effacer   
</body>

</html>
 -->

<!-- 
 Erreur
    WANE A EFFACEE TOUT CE BLOCK
 -->

 <!--
      Erreur 
   TU DEPLACE LE BLOC STYLE EN BAS ET TU AJOUTES ATTRIBUT 
    type="text\css"
    WANE A EFFACEE TOUT CE BLOCK
 -->

 <style type="text/css">

.alignement {
    margin-left: 30px;
}

.arrondire {
    border-radius: 5px 5px 5px 5px;
    height: 20px;
}

.imgav{
    border-radius: 50%;
    height:110px;
    width:110px;
    
   
}
</style>
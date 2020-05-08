<?php
//is_connect();
$loginErro ="";
$passwordError  ="";
$errorformat = "";
$prenom = "";
$nom="";
$login = "";
$photo = "";
if (isset($_POST['bouton'])) {
    $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $pwd = $_POST['pwd'];
        $login = $_POST['login'];
       // $photo = $_POST['photo'];
        if (isset($_SESSION['statut'])) {
            $profil = "admin";
        }
        else{
            $profil = 'joueur';
        }

    $file = "./data/utilisateur.json";
    $mainjson = file_get_contents($file);
    $data = json_decode($mainjson, true);
    $format_autorises = ['image/png',
		'image/jpg',
		'image/jpeg'
    ];
    if( in_array($_FILES['photo']['type'], $format_autorises) ){
        $array = explode('.', $_FILES['photo']['name']);
        $filename = date('YmdHis').".". $array[sizeof($array)-1];

        if(move_uploaded_file($_FILES['photo']['tmp_name'], '.\/public\/images'.$filename)){
            $photo = '.\/public\/images'.$filename;
        }
        else {
            $errorformat = "format incorrect";
        }

    }

    if ((is_in($_POST['login']) || ($_POST['pwd'] != $_POST['pwd_confirm']))) {
        if (is_in($_POST['login'])) {
            $loginErro = "ce login existe déjà";
        }
        if (($_POST['pwd'] != $_POST['pwd_confirm'])) {
            $passwordError= "les deux mots de passe doivent etre identique";
        }
    }
    else {
        $data[] = array(
            "prenom"=> $prenom,
            "nom"=> $nom,
            "login"=> $login,
            "password"=> $pwd,
            "profil"=> $profil,
            "photo"=>$photo,
            "score" => 0
        );
        $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
        $save = file_put_contents($file, $jsonfile);
        if ($save) {
            $result = connexion($login,$pwd);
            header("location: admin1.php");
        }
    }   
}
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrire</title>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-image: url("img-bg.jpg");
        background-color: green
    }

    .alignement {
        margin-left: 30px;
    }

    .arrondire {
        border-radius: 5px 5px 5px 5px;
        height: 20px;
    }

    #preview {
        width: 200px;
        display: inline-block;
    }

    #preview img {


        border-radius: 50%;
        width: 200px;
        height: 200px;
        float: left;
        margin-left: 125px;

    }

    .error-form {
        color: red;
        width: 100%;
        font-size: 16px;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <!--  <div id="logo" style="background-color:black;margin-top:-20px ">
    
      <p> <img src="logo-QuizzSA.png" alt="logoduquizz" width="40px" />
       <h1 style="color:white ;text-align:center;margin-top:-60px; "> Le plaisir de jouer</h1></p>
    
    <p  style="color:white ;text-align:center;margin-top:-30px">Le plaisir de jouer</p> 
    </div>-->
    <div id="conteneur"
        style="background-color:white; width:75%; margin-left:150px; border-radius:10px 10px 10px 10px; margin-top:-20px; height:581px">
        <div id="gauche" style="width:60%; background-color:">
            <h1 class="alignement">S'inscrire</h1>
            <p class="alignement" style="margin-top:-20px">Pour proposer des quizz</p>
            <hr class="alignement" width="50%" color="midnightblue" size="2">

            <form action="" enctype="multipart/form-data" method="post" id="form-connexion">
                <div class="alignement">
                    <p>Prénom</p>
                    <input class="arrondire" error="error-1" type="text" placeholder="Aaaa" name="prenom">
                    <div class="error-form" id="error-1"></div>
                </div>
                <div class="alignement">
                    <p>nom</p>
                    <input class="arrondire" error="error-2" type="text" placeholder="BBBB" name="nom">
                    <div class="error-form" id="error-2"></div>
                </div>
                <div class="alignement">
                    <p>Login</p>
                    <input class="arrondire" error="error-3" type="text" placeholder="Aaaa" name="login">
                    <div class="error-form" id="error-3"></div>
                </div>
                <div class="alignement">
                    <p>Password</p>
                    <input class="arrondire" error="error-4" type="password" placeholder="**********" name="pwd">
                    <div class="error-form" id="error-4"></div>
                </div>
                <div class="alignement">
                    <p>Confirmer Password</p>
                    <input class="arrondire" error="error-5" type="password" placeholder="**********"
                        name="pwd_confirm">
                    <div class="error-form" id="error-5"></div>
                </div>
                <div class="alignement">
                    <p>Avatar
                        <input style="padding-left:100px; margin-bottom:px; border-radius:4px 4px 4px 4px"
                            onchange="handleFiles(files)" id="upload" type="file" name="photo" class="btn">
                    </p>

                </div>
                <div id="alignementdeux" style="margin-left:100px; border-radius:4px 4px 4px 4px">
                    <button type="text" name="bouton" class="btn">Créer compte</button>
                </div>
        </div>
        <div id="droite" style="width:35%; margin-left:625px; margin-top:-528px;">
            <div><label for="upload"><span id="preview"></span></label></div>
        </div>

        </form>


    </div>

    <script>
    function handleFiles(files) {
        var imageType = /^image\//;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            if (!imageType.test(file.type)) {
                alert("veuillez sélectionner une image");
            } else {
                if (i == 0) {
                    preview.innerHTML = '';
                }
                var img = document.createElement("img");
                img.classList.add("obj");
                img.file = file;
                preview.appendChild(img);
                var reader = new FileReader();
                reader.onload = (function(aImg) {
                    return function(e) {
                        aImg.src = e.target.result;
                    };
                })(img);

                reader.readAsDataURL(file);
            }

        }
    }
    </script>

    <script>
    const inputs = document.getElementsByTagName("input");
    for (input of inputs) {
        input.addEventListener("keyup", function(e) {
            if (e.target.hasAttribute("error")) {
                var idDivError = e.target.getAttribute("error");
                document.getElementById(idDivError).innerText = ""
            }
        })
    }
    document.getElementById("form-connexion").addEventListener("submit", function(e) {
        const inputs = document.getElementsByTagName("input");
        var error = false;
        for (input of inputs) {
            if (input.hasAttribute("error")) {
                var idDivError = input.getAttribute("error");
                if (!input.value) {
                    document.getElementById(idDivError).innerText = "Ce champ est obligatoire"
                    error = true
                }

            }

        }
        if (error) {
            e.preventDefault();
            return false;
        }

    })
    </script>

</body>

</html>
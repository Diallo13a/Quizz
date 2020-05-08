<?php

   if (isset($_POST['btn_enregistrer'])) {
      
        if ($_POST['nbp'] >=1) {
        if(isset($_POST["choix"]))
        {
          $choix =$_POST["choix"];
    
            $file=json_decode(file_get_contents('./data/questions.json'));
           
            $extra=array();
            $extra['question']=$_POST['questions'];
            $extra['nbredepoint']=$_POST['nbp'];
            $extra['typedereponse']= $choix ;
            
            if($choix=='ct')
            {
                //Erreur $_POST['reponse1'] au lieu de reponse
                //$extra['reponses']=$_POST['reponse'];
                $extra['reponses']=$_POST['reponse1'];
          
            $file[] = $extra;
            $json_data = json_encode($file);

            file_put_contents('./data/questions.json',$json_data);
        }
        else if($choix=='cs')
        {
           /*
             Erreur on commence par 1
            $nbrRow=0;
            */
            $nbrRow=1;
            $tab_reponse=array();
            while(isset($_POST['reponse'.$nbrRow]))
            {
                    if(isset($_POST['rad'.$nbrRow]))
                    {
                    
                        $tab_reponse['valeur']=$_POST['reponse'.$nbrRow];
                        $tab_reponse['bon_resultat']="oui";
                    }
                    else {
                        $tab_reponse['valeur']=$_POST['reponse'.$nbrRow];
                        $tab_reponse['bon_resultat']="non";
                    }
                    $extra['reponses'][]=$tab_reponse;
                    $nbrRow++;
            }
            $file[] = $extra;
            $json_data = json_encode($file);

            file_put_contents('./data/questions.json',$json_data);
       
        }
        else if($choix=='cm')
        {
            /*
             Erreur on commence par 1
            $nbrRow=0;
            */
            $nbrRow=1;
            $tab_reponse=array();
            while(isset($_POST['reponse'.$nbrRow]))
            {
                    if(isset($_POST['cbx'.$nbrRow]))
                    {
                        $tab_reponse['valeur']=$_POST['reponse'.$nbrRow];
                        $tab_reponse['bon_resultat']="oui";
                    }
                    else {
                        $tab_reponse['valeur']=$_POST['reponse'.$nbrRow];
                        $tab_reponse['bon_resultat']="non";
                    }
                    $extra['reponses'][]=$tab_reponse;
                    $nbrRow++;
            }
            $file[] = $extra;
            $json_data = json_encode($file);

            file_put_contents('./data/questions.json',$json_data);
       
        }
        }
        else{
            echo "Choisissez une type de reponse";
        }
        }else {
            echo "Nbre de point insuffisant";
        }
    }
   // var_dump($_POST);
?>
<!--<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuto</title>

</head>

<body>
</body>
-->
    <div style="height:auto">
        <div class="header" style="height:auto">
            <h1>PARAMETRER VOS QUESTIONS</h1>
        </div>
        <form action="" id="form-connexion" name="form-connexion" method="POST">
            <div>
                <p>
                    <label class="deplacement" for="questions" style="">Questions</label>
                    <textarea class="deplacement font" name="questions" id="questions" rows="5" cols="30"
                        error="error-5"></textarea>
                    <div class="error-form" id="error-5"></div>
                </p><br>

            </div>
            <div style="height:auto">
                <p>
                    Nbre de points
                    <input type="number" style="width:50px" name="nbp" step="number" min=1 class="deplacement font"
                        error="error-1">
                    <div class="error-form" id="error-1"></div>
                </p>
            </div>

            <div style="height:auto">
                <label id="deplacement" for="choix">Type de réponse</label>
                <select name="choix" id="choix" class="select" onchange="">
                    <option value="" id="">Donnez le type de reponse</option>
                    <option value="cm" id="type">Choix multiple</option>
                    <option value="cs">Choix simple</option>
                    <option value="ct">Choix texte</option>
                </select>
            </div>
            <div id="inputs" style="height:auto">
                <div class="row" id="row_0">
                    <button type="button" class="btn btn-green font" onclick="onAddInput()">+</button><br>
                    <!--  <input type="text" class="champ font">-->

                </div>

            </div>

            <div style="height:auto">
                <button type="submit" name="btn_enregistrer" class="btnv" value="Ok">Enregistrer</button>
            </div>

        </form>

    </div>

    <script>
    var nbrRow = 0;

    function onAddInput() {
        var type = document.getElementById('choix').value;
        if (type == 'ct') {
            nbrRow++;
            var divInputs = document.getElementById('inputs');
            var newInput = document.createElement('div');
            var recup = document.getElementById('choix').value;
            newInput.setAttribute('class', 'row');
            newInput.setAttribute('id', 'row_' + nbrRow);
            newInput.innerHTML = `
                <input type="text" class="champ font" name="reponse${nbrRow}" error="error-2">
                <button type="button" class="btn btn-red font" onclick="onDeleteInput(${nbrRow})">X</button>
                <input id="prodId" name="nb_reponse" type="hidden" value="comp">
                <div class="error-form" id="error-2"></div>
                `;
            divInputs.appendChild(newInput);
        } else if (type == 'cm') {
            nbrRow++;
            var divInputs = document.getElementById('inputs');
            var newInput = document.createElement('div');
            var recup = document.getElementById('choix').value;
            newInput.setAttribute('class', 'row');
            newInput.setAttribute('id', 'row_' + nbrRow);
            newInput.innerHTML = `
                <input type="text" class="champ font" name="reponse${nbrRow}" error="error-3">
                <input type="checkbox" name="cbx${nbrRow}" id="cbx">
                <button type="button" class="btn btn-red font" onclick="onDeleteInput(${nbrRow})">X</button>
                <input id="prodId" name="nb_reponse" type="hidden" value="comp">
                <div class="error-form" id="error-3"></div>
                `;
            divInputs.appendChild(newInput);
        } else if (type == 'cs') {
            nbrRow++;
            var divInputs = document.getElementById('inputs');
            var newInput = document.createElement('div');
            var recup = document.getElementById('choix').value;
            newInput.setAttribute('class', 'row');
            newInput.setAttribute('id', 'row_' + nbrRow);
            newInput.innerHTML = `
                <input type="text" class="champ font" name="reponse${nbrRow}" error="error-4">
                <input type="radio" name="rad${nbrRow}" id="rad">
                <button type="button" class="btn btn-red font" onclick="onDeleteInput(${nbrRow})">X</button>
                <input id="prodId" name="nb_reponse" type="hidden" value="comp">
                <div class="error-form" id="error-4"></div>
                `;
            divInputs.appendChild(newInput);
        }
    }

    function onDeleteInput(n) {
        var target = document.getElementById('row_' + n);
        setTimeout(function() {
            target.remove();
        }, 500)
        fadeOut('row_' + n);
    }

    function fadeOut(idTarget) {
        var target = document.getElementById(idTarget);
        var effect = setInterval(function() {
            if (!target.style.opacity) {
                target.style.opacity = 1;
            }
            if (target.style.opacity) {
                target.style.opacity -= 0.1;
            } else {
                clearInterval(effect);
            }
        }, 200)
    }

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

    const textareas = document.getElementsByTagName("textarea");
    for (input of inputs) {
        input.addEventListener("keyup", function(e) {
            if (e.target.hasAttribute("error")) {
                var idDivError = e.target.getAttribute("error");
                document.getElementById(idDivError).innerText = ""
            }
        })
    }
    document.getElementById("form-connexion").addEventListener("submit", function(e) {
        const textareas = document.getElementsByTagName("textarea");
        var error = false;
        for (textarea of textareas) {
            if (textarea.hasAttribute("error")) {
                var idDivError = textarea.getAttribute("error");
                if (!textarea.value) {
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

    <style type="text/css">
    body {}

    .font {
        font-size: 20px;
        border-radius: 6px;
    }

    .champ {
        background-color: whitesmoke;
        border: 2px solid navajowhite;
        text-align: center;
    }

    .btn {
        padding: 0 10px;
    }

    .btn-green {
        border: 3px solid green;
        background-color: forestgreen;
        margin-left: 400px;
        margin-top: -38px;
        position: absolute;
    }

    .btn-red {
        border: 3px solid darkred;
        background-color: indianred;
    }

    .row {
        padding: 10px;
    }

    .select {
        font-size: 20px;
        border-radius: 6px;
        background-color: whitesmoke;
        border: 2px solid navajowhite;
        margin-top: 20px;
        position: relative;
    }

    .header {
        text-align: center;
    }

    .btnv {
        font-size: 24px;
        border-radius: 4px;
        border: 2px solid #4CAF50;
        transition-duration: 0.4s;
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        margin-left: 450px;
    }

    .error-form {
        color: red;
        width: 100%;
        font-size: 16px;
        font-weight: bold;
    }
    </style>
    <?php
    /*
if (isset($_POST['btn_enregistrer'])) {
    var_dump($_POST);
        function ajoutQuestion(){
                $tab=[];
                $msg="";
                if (!empty($_POST['questions']) and !empty($_POST['nbp']) and !empty($_POST['choix'])) {
                    if (!is_numeric($_POST['nbp']) or $_POST['nbp']<1) {
                        $msg="nombre de point invalide";
                    }
                    elseif (empty($_POST['cbox']) and empty($_POST['rad'])) {
                        $msg="Il faut au moins une réponse exacte";
                    }else {
                        $nb_reponse = isset($_POST['nb_reponse'])?$_POST['nb_reponse']:"";
                        $tab['questions']=$_POST['questions'];
                        switch ($_POST['choix']) {
                            case 'cm':
                                $bonne_rep = $_POST['cbox'];
                                $tab['typedereponse'] = 'cm';
                                for ($i=1; $i <= nb_reponse; $i++) { 
                                    if (!empty($_POST["reponse"])) {
                                        $tab["reponse'+${nbrRow}+'"]['valeur']=$_POST["reponse"];
                                        if (in_array("reponse",$bonne_rep)) {
                                            $tab["reponse"]['correcte']="oui";
                                        }else {
                                            $tab["reponse"]['correcte']="non";
                                        }
                                    }
                                }
                                break;
                                case 'cs';
                                $tab['typedereponse'] = 'cs';
                                $radio = $_POST['rad'];
                                for ($i=0; $i <=nb_reponse ; $i++) { 
                                    if (!empty($_POST['reponse'].$i)) {
                                        $tab["reponse"]['valeur']=$_POST["reponse"];
                                        if ($radio=="reponse" ){
                                            $tab["reponse".$i]['correcte']="oui";
                                        } else {
                                            $tab["reponse".$i]['correcte']="non";
                                        }
                                        
                                    }
                                }
                            break;
                            
                            default:
                                $tab['typedereponse']='ct';
                                $tab['reponse']['valeur']=$_POST['reponse'];//à verifier
                                $tab['reponse']['correcte']="oui";
                                break;
                        }
                        $tab['nbredepoint']=$_POST['nbp']; 
                    }
                }
                if (!empty($tab)) {
                    if(getDatadd($tab)){
                        $msg="La question a été ajouter avec succés !";
                    }
                }
            }
        }*/
        
    ?>



</html>
<script type="text/javascript">
//<![CDATA[

/*   function valider() {
       // si la valeur du champ prenom est non vide
       if (document.form-connexion.questions.value != "") {
           // les données sont ok, on peut envoyer le formulaire    
           return true;
       } else {
           // sinon on affiche un message
           alert("Saisissez le prénom");
           // et on indique de ne pas envoyer le formulaire
           return false;
       }
   }*/

//]]>
</script>
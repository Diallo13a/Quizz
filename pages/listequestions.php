<div class="tete" id="un">
        <form action="" method="post">
            <div>
                <p>
                   <span class="pnbq"> Nbre de questions/jeux</span>
                    <input type="number" style="width:50px" name="nbq" id="inputnumber" value="" step="number" class="deplacement font" error="error-1">
                    <button type="submit" name="btnok" class="bout font">OK</button>
                   
                </p>
            </div>    
                      
        </form>
        <?php
                 //   $msg='';
                    
                        if(isset($_POST['btnok'])){
                           // var_dump($_POST);die();
                            if(empty($nbq) && $_POST['nbq']<5){
                               // var_dump($_POST);die();
                                echo "Veuillez saisir un nombre superieur ou égale à 5";
                               // echo $msg;
                            }else{
                              echo "Afficher les messages";
                            //   $file=json_decode(file_get_contents('nombrequestion.json')); on le commente pour ecraser le contenu à chaque input
                               $extra=array();
                               $extra['nombre']=$_POST['nbq'];
                               $file[] = $extra;
                               $json_data = json_encode($file);
                   
                               file_put_contents('./data/nombrequestion.json',$json_data);
                               //$nbq = getDataq('nombrequestion');
                              // $nbqq = $nbq[0]['question_jeux'];
                              // echo $msg;
                             /* $json_data = json_encode($_POST['nbq']);
                              file_put_contents('./data/nombrequestion.json',$json_data);
                              $nbq = json_decode(file_get_contents('./data/nombrequestion.json'));*/

                            }
                        }
                    ?>

        </form>
        <?php
if (isset($_GET['page'])) {
    $page=$_GET['page'];
}else {
    $page=1;
}

$liste_question = getDatadd("questions");


$total=count($liste_question);
const NBREQUESTIONPARPAGE=10;
$min =($page-1)*NBREQUESTIONPARPAGE;
$max = $min + NBREQUESTIONPARPAGE -1 ;
$compt=0;


    for ($i=$min; $i <=$max ; $i++) { 
            if ($i==$total) {
            break;
            } else {
                if ($liste_question[$i]['typedereponse']=="ct") {
                    $compt++;
                    echo"<h4 id='deptext'>".$compt.". ".$liste_question[$i]["question"]."</h4><input type='text'  readonly='readonly' class='text checbox' value='".$liste_question[$i]["reponses"]."'/>";
                    echo "<br>";
               
                }elseif ($liste_question[$i]['typedereponse']=="cs") {
                    $compt++;
                    //Erreur reponses a la place de Reponse
                    // $tab=$liste_question[$i]["reponse"];
                    $tab=$liste_question[$i]["reponses"];
                     echo "<h4 class='depquestion'>".$compt.". ".$liste_question[$i]["question"]."</h4>";
                    for ($j=0; $j <count($tab) ; $j++) { 
                        if ($tab[$j]['bon_resultat']=="oui") {
                            echo "<input type='radio' name='radio.$j' checked='checked' class='checbox' />'".$tab[$j]['valeur'];
                            echo "<br>";
                        } else {
                            echo "<input type='radio' name='radio.$j'  class='checbox' />'".$tab[$j]['valeur'];
                            echo "<br>";
                        }
                    }
                }elseif ($liste_question[$i]['typedereponse']=="cm") {
                    $compt++;
                    //Erreur reponses a la place de Reponse
                    // $tab=$liste_question[$i]["reponse"];
                    $tab=$liste_question[$i]["reponses"];
                   
                     echo "<h4 class='depquestion'>".$compt.". ".$liste_question[$i]["question"]."<h4>";
                    for ($k=0; $k <count($tab) ; $k++) { 
                        if ($tab[$k]['bon_resultat']=="oui") {
                            echo "<input type='checkbox' name='checkbox.$k' checked='checked' class='checbox' />'".$tab[$k]['valeur'];
                            echo "<br>";
                        } else {
                            echo "<input type='checkbox' name='checkbox.$k'  class='checbox' />'".$tab[$k]['valeur']."'<br>";
                        }
                    }
                }
            }
    }
    if ($page>1) {
        ?> <a href='index.php?lien=accueil&block=listequestions&page=<?=$page-1?>' class='previous'>PRECEDENT</a>
        <?php
    }else {
        echo "";
    }if ($compt<NBREQUESTIONPARPAGE) {
        echo "";
    } else {
        ?>
        <a href='index.php?lien=accueil&block=listequestions&page=<?=$page+1?>' class='next'>SUIVANT</a>
        <?php
    }    
?>



    </div>

<style type ="text/css">
    .text {
        background-color: whitesmoke;
        border: 2px solid navajowhite;
        font-size: 20px;
        border-radius: 6px;
        width: 300px;
    }

    a {
        text-decoration: none;
        display: inline-block;
        padding: 8px 16px;
    }

    a:hover {
        background-color: forestgreen;
        color: black;
    }

    .previous {
        background-color: #f1f1f1;
        color: black;
        margin-left: 500px;
        border: 3px solid darkred;
        border-radius: 6px;
    }

    .checbox {
        margin-left: 20px;
    }

    .next {
        background-color: #4CAF50;
        color: white;
        margin-left: 500px;
        border: 3px solid greenyellow;
        border-radius: 6px;
    }

    .depquestion {
        margin-left: 10px;
    }

    #deptext {
        margin-left: 10px;
    }
    .font {
            font-size: 20px;
            border-radius: 6px;
            border: 2px solid navajowhite;
            margin-left: 50px;
        }
    .pnbq{
        font-size: 20px;
        margin-left: 10px;
    }    
    .bout{
        background-color: #4CAF50;
    </style>